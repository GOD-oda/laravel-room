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
        $logo = 'Payment Manager';
        $records = Payment::all();

        return view('admin.payment.index', compact('records', 'logo'));
    }

    public function search(Request $requests)
    {
        $logo = 'Payment Manager';
        $records = Payment::search($requests);

        return view('admin.payment.index', compact('records', 'logo'));
    }

    public function create()
    {
        $logo = 'Create New Record';

        return view('admin.payment.create', compact('logo'));
    }

    public function store(PaymentRequest $requests)
    {
        $input = $requests->all();

        Payment::create($input);

        return redirect()->route('payment.index');

    }

}
