<?php

namespace App\Http\Controllers\User;

use App\Account;
use App\Http\Controllers\Controller;
use App\Order;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function account(Request $request)
    {
        try {
            $this->validate($request, [
                'account_name' => 'required|max:255',
                'account_number' => 'required',
                'bank_name' => 'required'
            ]);

            $account = Account::where('user_id', Auth::id())->first();
            if ($account) {
               $data = Account::where('user_id', Auth::id())->update([
                    'account_name' => $request->account_name,
                    'account_number' => $request->account_number,
                    'bank_name' => $request->bank_name
                ]);

                if ($data) {
                    return back()->with('success', 'Account details updated successfully');
                }
            }else{
                $acc = new Account();
                $acc->user_id = Auth::id();
                $acc->account_name = $request->account_name;
                $acc->account_number = $request->account_number;
                $acc->bank_name = $request->bank_name;

                if ($acc->save()) {
                    return back()->with('success', 'Account details created successfully');
                }
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function biodata(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
            ]);

            $data = User::where('id', Auth::id())->update([
                'name' => $request->name
            ]);
            if ($data) {
                return back()->with('success', 'Bidata details updated successfully');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function changepassword(Request $request)
    {
        try {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

            return back()->with('success', 'Password changed successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function convert_to_btc($amount = null)
    {
        if ($amount != null) {
            $convert = get_curl('https://blockchain.info/tobtc?currency=USD&value='.$amount);
            return response()->json($convert, 200);
        }
    }

    public function order_user()
    {
        $order = Order::where('user_id', Auth::id())->get();
        return view('user.pages.orders', ['orders' => $order]);
    }
}
