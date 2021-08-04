<?php

namespace App\Http\Controllers\Admin;

use App\Catalogue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\PostModel;
use App\Withdrawal;
use App\Wallet;
use DB;
use App\User;

class CatalogueController extends Controller
{
    
     public function dashboard(){
        return view('admin.dashboard');
    }
    
     public function dashboard_user(){
        return view('admin.dashboard_user');
    }
    
     public function users_detail1(){
        $merged=DB::table('users')
                ->leftJoin('wallets', 'users.id', '=', 'wallets.user_id')
                ->leftJoin('withdrawals', 'users.id', '=', 'withdrawals.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.mobile', 'users.role',
                    'users.referal_code',
                    'users.referee', 'withdrawals.amount', 'withdrawals.status','wallets.balance',
                    'users.created_at', 'users.last_login')
                ->get();
        return view('admin.users_status', compact(['merged']));

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
        return view('admin.user_detail', compact(['merged']));

        }
        
    public function message(){
        return view('admin.message');
    }
    
   public function change(Request $request){
        $post=PostModel::find(1);
        $post->subject=$request->get('subject');
        $post->message=$request->get('message');
        $post->save();
        return  view('admin.update');
    }
      
     public function change1(){
         return view('admin.update');
       
    }
    
    // public function messageAlert(){
    //     return view('user.pages.index');
    // }


    public function catalogue()
    {
        $catalogue = Catalogue::all();
        return view('admin.catalogue', ['catalogues' => $catalogue]);
    }

    public function create_catalogue()
    {
        return view('admin.create_catalogue');
    }

    public function post_catalogue(Request $request)
    {
        try {
            $request->validate([
                'product_type' => 'required',
                'denomination' => 'required|string',
                'rate' => 'required|string',
                'avatar' => 'required'
            ]);

            $catalogue = new Catalogue();
            $catalogue->product_type = $request->product_type;
            if ($request->product_type === "bitcoin") {
                $catalogue->product_name = 'bitcoin';

            }else if($request->product_type === "usdt"){
                $catalogue->product_name = 'usdt';

            } else if ($request->product_type === "ethereum") {
                $catalogue->product_name = 'ethereum';
            } else{
                $catalogue->product_name = $request->product_name;
            }

            $catalogue->denomination = $request->denomination;
            $catalogue->rate = $request->rate;

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $location = 'images/catalogue/' . $fileName;
                Image::make($image)->save($location);

                $catalogue->avatar = $fileName;

                if ($catalogue->save()) {
                    return back()->with('success', 'Catalogue added successfully!!!');
                }
            }

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Catalogue::find($id);
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
            $info = Catalogue::find($id);
            return response()->json($info);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'product_type' => 'required',
                'product_name' => 'required|string|max:255',
                'denomination' => 'required|string',
                'rate' => 'required|string',
            ]);

            $id = $request->edit_id;
            $type = Catalogue::select('product_type')->where('id', $id)->first();
            if ($type["product_type"] == 'bitcoin' && Auth::user()->role == 'accountant' || Auth::user()->role == 'superadmin') {
                $catalogue = Catalogue::find($id);
                $catalogue->product_type = $request->product_type;
                $catalogue->product_name = $request->product_name;
                $catalogue->denomination = $request->denomination;
                $catalogue->rate = $request->rate;

                if ($catalogue->save()) {
                    return back()->with('success', 'Catalogue updated successfully!!!');
                }
            }else if($type["product_type"] == 'bitcoin' || $type["product_type"] == 'giftcard' && Auth::user()->role == 'superadmin'|| Auth::user()->role == 'admin'){
                $catalogue = Catalogue::find($id);
                $catalogue->product_type = $request->product_type;
                $catalogue->product_name = $request->product_name;
                $catalogue->denomination = $request->denomination;
                $catalogue->rate = $request->rate;

                if ($catalogue->save()) {
                    return back()->with('success', 'Catalogue updated successfully!!!');
                }
            }
            else{
                return back()->with('error', 'You do not have permission to edit this product!!! You can only edit a bitcoin product');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
