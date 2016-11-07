<?php

namespace App\Http\Controllers;

use App\Libraries\PriceSummarize;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		$user = Auth::user();
		$priceSummarize = new PriceSummarize();
		$data = [
			'user' => $user,
			'price' => new Price(),
			'totalPrice' => $priceSummarize->getTotalPrice(),
		];
		return view('payment', $data);
	}

	public function save(Request $request) {
	}

}