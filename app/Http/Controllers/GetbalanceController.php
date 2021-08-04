<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;

class GetbalanceController extends Controller
{
	public function index(){
    	$balance=Withdrawal::all();
   		 dd($balance);

	}
}
