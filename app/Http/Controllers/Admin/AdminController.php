<?php

namespace App\Http\Controllers\Admin;

use App\BlockChain;
use App\Http\Controllers\Controller;
use App\Order;
use App\Terminate;
use App\User;
use App\Wallet;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Message;
use DB;

class AdminController extends Controller
{
    public function orders()
    {
        $order = Order::latest()->get();
        return view('admin.orders', ['orders' => $order]);
    }

    public function users()
    {
        $user = User::where('role', 'user')->get();
        return view('admin.users', ['users' => $user]);
    }

    public function staff()
    {
        $user = User::where('role', 'admin')->orWhere('role', 'superadmin')->orWhere('role', 'accountant')->orWhere('role', 'junior')->get();
        return view('admin.staffs', ['users' => $user]);
    }

    public function blockchain()
    {
        $blockchain = BlockChain::all();
        return view('admin.blockchain', ['blocks' => $blockchain]);
    }

    public function blockchain_post(Request $request)
    {
        try {
            $request->validate([
                'product_name' => 'required',
                'product_type' => 'required',
                'address' => 'required|max:255'
            ]);

            $block = new BlockChain();
            $block->product_name = $request->product_name;
            $block->product_type = $request->product_type;
            $block->address = $request->address;

            if ($block->save()) {
                return back()->with('success', 'Bitcoin Address Created Successfully');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function blockchain_delete(Request $request)
    {
        $id = $request->id;
        $data = BlockChain::find($id);
        $response = $data->delete();
        if ($response) {
            echo "Record Deleted successfully.";
        } else {
            echo "There was a problem. Please try again later.";
        }
    }

    public function users_delete(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        $response = $data->delete();
        if ($response) {
            echo "Record Deleted successfully.";
        } else {
            echo "There was a problem. Please try again later.";
        }
    }

    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $info = User::find($id);
            return response()->json($info);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'user_type' => 'required',
            ]);

            $id = $request->edit_id;
            $user = User::find($id);
            $user->role = $request->user_type;

            if ($user->save()) {
                return back()->with('success', 'User upgraded successfully!!!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function orders_pending()
    {
        $order = Order::where('status', 'pending')->latest()->get();
        return view('admin.orders_pending', ['orders' => $order]);
    }

    public function orders_completed()
    {
        $order = Order::where('status', 'completed')->latest()->get();
        return view('admin.orders_completed', ['orders' => $order]);
    }

    public function orders_cancelled()
    {
        $order = Order::where('status', 'cancelled')->latest()->get();
        return view('admin.orders_cancalled', ['orders' => $order]);
    }

    public function orderapp()
    {
        $order = Order::where('status', 'approved')->latest()->get();
        return view('admin.orders_approved', ['orders' => $order]);
    }

    public function orders_details($id = null)
    {
        if ($id != null) {
            $order = Order::with('user')->with('catalogue')->with('blockchain')->with('images')->where('id', $id)->first();
            return view('admin.orders_details', ['orders' => $order]);
        }

    }

    public function cancel_order(Request $request)
    {
        try {
            $id = $request->id;
            $catalogue = Order::find($id);
            $catalogue->status = 'cancelled';

            if ($catalogue->save()) {
                echo "Order was cancelled successfully.";
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function approve_order(Request $request)
    {
        try {
            $id = $request->id;
            $catalogue = Order::find($id);
            $catalogue->status = 'approved';

            if ($catalogue->save()) {
                echo "Order was Approved successfully.";
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function accept_order(Request $request)
    {
        try {
            $id = $request->id;
            $catalogue = Order::find($id);
            $catalogue->status = 'accepted';
            $catalogue->app_staff = Auth::user()->name;

            if ($catalogue->save()) {
                echo "Order was Accepted successfully.";
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function validate_order(Request $request)
    {
        try {
            $id = $request->id;
            $catalogue = Order::find($id);
            $catalogue->status = 'validated';

            if ($catalogue->save()) {
                echo "Order was Accepted successfully.";
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function payment_order(Request $request)
    {
        try {
            $id = $request->id;
            $catalogue = Order::find($id);
            $catalogue->status = 'completed';

            if ($catalogue->save()) {
                $record = Wallet::where('user_id', $request->user_id)->first();
                if ($record) {
                    $wallet = Wallet::select('balance')->where('user_id', $request->user_id)->first();
                    $amt = $wallet["balance"] + preg_replace('~\D~', '', $request->amt_naira);

                    $update = Wallet::where('user_id', $request->user_id)->update([
                        'balance' => $amt
                    ]);
                    if ($update) {
                        echo "Payment Confirmed.";
                    }
                }
                else{
                    $wallet = new Wallet();
                    $wallet->user_id = $request->user_id;
                    $wallet->balance = preg_replace('~\D~', '', $request->amt_naira);

                    if ($wallet->save()) {
                        echo "Payment Confirmed.";
                    }
                }
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function cancel_reason(Request $request)
    {
        try {
            $request->validate([
                'reason' => 'required|max:255'
            ]);

            Order::where('id', $request->order_id)->update([
                'amount_dollar' => $request->new_amt,
                'amount_naira' => $request->new_amt_naira
            ]);

            $block = new Terminate();
            $block->user_id = Auth::id();
            $block->order_id = $request->order_id;
            $block->reason = $request->reason;

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $location = 'images/cancel/' . $fileName;
                Image::make($image)->save($location);

                $block->avatar = $fileName;
            }

            if ($block->save()) {
                return back()->with('success', 'Order amount was updated succesfully!!!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    
    public function cancel_reasons(Request $request)
    {
        try {
            $request->validate([
                'reasons' => 'required|max:255'
            ]);

            Order::where('id', $request->order_ids)->update([
                'status' => 'cancelled'
            ]);

            $block = new Terminate();
            $block->user_id = Auth::id();
            $block->order_id = $request->order_ids;
            $block->reason = $request->reasons;

            if ($request->hasFile('avatars')) {
                $image = $request->file('avatars');
                $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $location = 'images/cancel/' . $fileName;
                Image::make($image)->save($location);

                $block->avatar = $fileName;
            }

            if ($block->save()) {
                return back()->with('success', 'Order amount was updated succesfully!!!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function withdraw_request()
    {
        $withdraw_request = Withdrawal::latest()->get();
        return view('admin.withraw', ['withdraws' => $withdraw_request]);
    }

    public function approve_request(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required'
            ]);

            $id = $request->edit_id;
            $payment = Withdrawal::find($id);
            $payment->status = 'paid';

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $location = 'images/payment/' . $fileName;
                Image::make($image)->save($location);

                $payment->avatar = $fileName;
            }

            if ($payment->save()) {
                return back()->with('success', 'Payment Confirmed!!!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

     public function user_details($id = null)
    {
       if ($id != null) {
            $user = User::where('id', $id)->first();
            $orders = Order::where('user_id', $id)->get();
            return view('admin.user_detail', ['user' => $user, 'orders' => $orders]);
       }
    }


  public function user_detail2(){
        $merged=DB::table('users')
                ->join('wallets', 'users.id', '=', 'wallets.user_id')
                ->join('withdrawals', 'users.id', '=', 'withdrawals.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.mobile', 'users.role',
                    'users.referal_code',
                    'users.referee', 'withdrawals.amount', 'withdrawals.status','wallets.balance',
                    'users.created_at', 'users.last_login')
                ->get();
        return view('admin.user_detail', ['merged'=>$merged]);
  

        }
        
     public function credit_view(){
        return view('admin.user_balance');
    }
    
    public function credit(Request $request, $id){
        $credit= new Wallet;
        $credit->balance=$request->get('balance');
        $credit->where('user_id', $id)->increment('balance', $credit->balance);
        return redirect('/admin/dashboard');
        
    }

    public function approve_view(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $info = Withdrawal::find($id);
            return response()->json($info);
        }
    }
}
