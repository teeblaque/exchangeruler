<?php

namespace App\Http\Controllers;

use App\Catalogue;
use App\Mail\Contact;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $giftcard = Catalogue::where('product_type', 'giftcard')->inRandomOrder()->take(5)->get();
        return view('front.pages.index', ['giftcard' => $giftcard]);

    }

    public function referal($referal = null)
    {
        if ($referal != null) {
            return redirect()->route('index');
            // $refer = User::select('id')->where('referal_code', $referal)->first();
            // if ($refer) {
            //     $wallet = Wallet::select('balance')->where('user_id', $refer["id"])->first();
            //     if ($wallet) {
            //         $total = $wallet["balance"] + 500;
            //         $update_wallet = Wallet::where('user_id', $refer["id"])->update([
            //             'balance' => $total
            //         ]);
            //         if ($update_wallet) {
            //             return redirect()->route('index');
            //         }else{
            //             return redirect()->route('index');
            //         }
            //     }
            // }else{
            //     return redirect()->route('index');
            // }
        }
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function contact_post(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'contents' => 'required'
            ]);

            $data = array(
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'contents' => $request->contents
            );

            Mail::to('exchangeruler@gmail.com')->send(new Contact($data));
            return response()->json('Mail was Sent successfully', 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
