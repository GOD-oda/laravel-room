<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PaymentRequest;
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
        $logo = 'Create New Record';

        return view('admin.payment.create', compact('logo'));
    }

    public function store(PaymentRequest $requests)
    {
        dd($requests);
    }

}
