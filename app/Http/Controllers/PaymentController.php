<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Http\Requests;
use App\Http\Requests\PaymentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payments = Payment::all();

        return view('admin.payment.index', compact('payments'));
    }

    public function search(Request $requests)
    {
        $payments = Payment::search($requests);

        return view('admin.payment.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function store(PaymentRequest $requests)
    {
        $input = $requests->all();

        Payment::create($input);

        return redirect()->route('payment.index');

    }

}
