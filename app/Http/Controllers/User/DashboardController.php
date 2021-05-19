<?php

namespace App\Http\Controllers\User;

use App\Account;
use App\BlockChain;
use App\Card;
use App\Catalogue;
use App\Http\Controllers\Controller;
use App\Mail\UserBid;
use App\OImage;
use App\Order;
use App\User;
use App\Wallet;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Double;

class DashboardController extends Controller
{
    public function index()
    {
        $account = Account::where('user_id', Auth::user()->id)->first();
        if ($account) {
            $user_role = User::select('role')->where('id', Auth::id())->first();

            if ($user_role['role'] == 'superadmin' || $user_role['role'] == 'account') {
                $total = Order::all();
                $pending = Order::where('status', 'Pending')->get();
                $cancel = Order::where('status', 'Cancelled')->get();
                $complete = Order::where('status', 'Completed')->get();
                $transaction = Order::with('catalogue')->latest()->limit(10)->get();
                $users = User::where('role', 'user')->get();
                $staffs = User::where('role', 'admin')->get();
                $admin = User::Where('role', 'superadmin')->get();
                return view('admin.index', [
                    'accounts' => $account, 'total' => $total, 'pending' => $pending, 'cancel' => $cancel, 'complete' => $complete,
                    'transactions' => $transaction, 'users' => $users, 'staffs' => $staffs, 'admin' => $admin
                ]);
            }else if($user_role['role'] == 'junior'){
                $total = Order::all();
                $pending = Order::where('status', 'Pending')->get();
                $cancel = Order::where('status', 'Cancelled')->get();
                $complete = Order::where('status', 'Completed')->get();
                $transaction = Order::with('catalogue')->where('status', 'pending')->latest()->limit(10)->get();
                $users = User::where('role', 'user')->get();
                $staffs = User::where('role', 'admin')->get();
                $admin = User::Where('role', 'superadmin')->get();
                return view('admin.index', [
                    'accounts' => $account, 'total' => $total, 'pending' => $pending, 'cancel' => $cancel, 'complete' => $complete,
                    'transactions' => $transaction, 'users' => $users, 'staffs' => $staffs, 'admin' => $admin
                ]);
            }else if($user_role['role'] == 'admin'){
                $total = Order::all();
                $pending = Order::where('status', 'Pending')->get();
                $cancel = Order::where('status', 'Cancelled')->get();
                $complete = Order::where('status', 'Completed')->get();
                $transaction = Order::with('catalogue')->where('status', 'accepted')->latest()->limit(10)->get();
                $users = User::where('role', 'user')->get();
                $staffs = User::where('role', 'admin')->get();
                $admin = User::Where('role', 'superadmin')->get();
                return view('admin.index', [
                    'accounts' => $account, 'total' => $total, 'pending' => $pending, 'cancel' => $cancel, 'complete' => $complete,
                    'transactions' => $transaction, 'users' => $users, 'staffs' => $staffs, 'admin' => $admin
                ]);
            }
            else{
                $total = Order::where('user_id', Auth::id())->get();
                $pending = Order::where('user_id', Auth::id())->where('status', 'Pending')->get();
                $cancel = Order::where('user_id', Auth::id())->where('status', 'Cancelled')->get();
                $complete = Order::where('user_id', Auth::id())->where('status', 'Completed')->get();
                $transaction = Order::where('user_id', Auth::id())->latest()->limit(10)->get();

                return view('user.pages.index', [
                    'accounts' => $account, 'total' => $total, 'pending' => $pending, 'cancel' => $cancel, 'complete' => $complete,
                    'transactions' => $transaction
                ]);
            }

        }else{
            return redirect()->route('user.settings');
        }

    }

    public function setting()
    {
        $account = Account::where('user_id', Auth::user()->id)->first();
        return view('user.pages.settings', ['accounts' => $account]);
    }

    public function sell_bitcoin()
    {
        $catalogue = Catalogue::all();
        $chain = BlockChain::all();
        return view('user.pages.sell_bitcoin', ['catalogue' => $catalogue, 'blocks' => $chain]);
    }
    
    public function sell_fund()
    {
        // $fund = Fund::all();
        return view('user.pages.sell_fund');
    }

    public function post_bitcoin(Request $request)
    {
        try {
            $request->validate([
                'order_type' => 'required',
                'services' => 'required',
                'amount_dollar' => 'required',
                'order_note' => 'required',
                'avatar' => 'required|max:2048'
            ]);

            $order = new Order();
            $order->user_id = Auth::id();
            $order->order_type = $request->order_type;
            $order->services = $request->services;
            $order->amount_dollar = $request->amount_dollar;
            $order->order_note = $request->order_note;
            $order->btc_amount = $request->btc_amount;
            $order->btc_address = $request->btc_address;
            $order->transaction = $request->transaction;
            $order->our_rate = $request->our_rate;
            $order->amount_naira = $request->amount_naira;
            $order->status = 'pending';

            if ($order->save()) {
                if ($request->hasFile('avatar')) {
                    foreach ($request->file('avatar') as $image) {
                        $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                        $location = 'images/order/' . $fileName;
                        Image::make($image)->save($location);

                        OImage::create([
                            'user_id' => Auth::id(),
                            'order_id' => $order->id,
                            'avatar' => $fileName
                        ]);
                    }
                    $check = Order::where('user_id', Auth::id())->first();
                    if ($check) {
                        $check2 = User::whereNotNull('referee')->where('id', Auth::id())->first();
                        if ($check2) {
                            $refer = User::select('id')->where('referal_code', $check2['referee'])->first();
                            if ($refer) {
                                $wallet = Wallet::select('balance')->where('user_id', $refer["id"])->first();
                                if ($wallet) {
                                    $total = $wallet["balance"] + 1000;
                                    Wallet::where('user_id', $refer["id"])->update([
                                        'balance' => $total
                                    ]);
                                }else{
                                    $wallet = new Wallet();
                                    $wallet->user_id = $refer["id"];
                                    $wallet->balance = 1000;

                                    $wallet->save();
                                }
                            }
                        }
                    }
                    $junior = User::where('role', 'junior')->orWhere('role', 'superadmin')->get();
                    if (count($junior) > 0) {
                        foreach ($junior as $value) {
                            Mail::to($value->email)->send(new UserBid($value));
                        }
                    }

                    return back()->with('success', 'Order Created successfully!!! Our customer service would reach out soon');
                }
            }

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function sell_giftcard()
    {
        return view('user.pages.sell_giftcard');
    }

    public function post_giftcard(Request $request)
    {
        try {
            $request->validate([
                'giftcard_type' => 'required',
                'card_country' => 'required',
                'card_type' => 'required',
                'amount' => 'required',
                'avatar' => 'required'
            ]);

            $card = new Card();
            $card->user_id = Auth::id();
            $card->giftcard_type = $request->giftcard_type;
            $card->card_country = $request->card_country;
            $card->card_type = $request->card_type;
            $card->amount = $request->amount;
            $card->get_amount = $request->get_amount;
            $card->status = 'Pending';

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $location = 'images/giftcard/' . $fileName;
                Image::make($image)->save($location);

                $card->avatar = $fileName;
            }

            if ($card->save()) {
                return back()->with('success', 'Giftcard uploaded successfully!!! Our customer service would reach out soon');
            }

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function wallet()
    {
        $wallet = Wallet::where('user_id', Auth::id())->first();
        $withdraw = Withdrawal::with('user')->where('user_id', Auth::id())->latest()->get();
        return view('user.pages.wallet', ['amounts' => $wallet, 'withdraws' => $withdraw]);
    }

    public function service_bitcoin($id = null)
    {
        if ($id != null) {
            $catalogue = Catalogue::where('id', $id)->first();
            return response()->json($catalogue, 200);
        }
    }

    public function transaction_bitcoin($id = null)
    {
        if ($id != null) {
            $catalogue = BlockChain::where('id', $id)->first();
            return response()->json($catalogue, 200);
        }
    }

   public function wallet_withdraw(Request $request)
    {
        try {
            $trans = Order::where('user_id', Auth::id())->first();
            if ($trans) {
                $wallet = Wallet::select('balance')->where('user_id', Auth::id())->first();
                if ($wallet) {
                    if ($request->amt_to_withdraw > $wallet['balance']) {
                        return back()->with('error', 'Insufficient Balance!!!, Kindly try again');
                    } else {
                        $withdraw = new Withdrawal();
                        $withdraw->user_id = Auth::id();
                        $withdraw->amount = $request->amt_to_withdraw;
                        $withdraw->status = 'pending';

                        if ($withdraw->save()) {
                            $total = $wallet['balance'] - $request->amt_to_withdraw;
                            $update_wallet = Wallet::where('user_id', Auth::id())->update([
                                'balance' => $total
                            ]);

                            $junior = User::where('role', 'superadmin')->get();
                            if (count($junior) > 0) {
                                foreach ($junior as $value) {
                                    Mail::to($value->email)->send(new UserBid($value));
                                }
                            }
                            if ($update_wallet) {
                                return back()->with('success', 'Withdrawal Process has being Initiated!!! You will receive payment shortly!!!');
                            }
                        }
                    }
                } else {
                    return back()->with('error', 'Insufficient Balance!!!, Kindly try again');
                }
            }else{
                return back()->with('error', 'You need to make your first transaction before you can withdraw');
            }
            
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function subcategory($protype = null)
    {
        if ($protype != null) {
            $protype = Catalogue::where('product_type', $protype)->get();
            if (count($protype) > 0) {
                return response()->json($protype, 200);
            }
        }
    }

    public function wallet_address($protype = null)
    {
        if ($protype != null) {
            $protype = BlockChain::where('product_name', $protype)->get();
            if (count($protype) > 0) {
                return response()->json($protype, 200);
            }
        }
    }
}
