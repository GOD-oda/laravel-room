<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logo = 'Payment Manager';

        return view('admin.payment.index', compact('logo'));
    }

    public function search(Request $requests)
    {
        dd($requests);
    }

    public function create()
    {

    }

    public function store()
    {

    }

}
