<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.deposit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allDeposit()
    {
        $allDeposit = Deposit::all();
        return view('backend.deposit_requst', compact('allDeposit'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'payment_method' => 'required',
            'account_number' => 'required|max:18',
            'transaction_id' => 'required',

        ]);

        Deposit::insert([
         'customer_id'=>$request->customer_id,
         'amount'=>$request->amount,
         'payment_method'=>$request->payment_method,
         'account_number'=>$request->account_number,
         'transaction_id'=>$request->transaction_id,
        ]);
        return back()->with('deposit_submit','Your Deposit Submition Done');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function addDepositBalance($id)
    {
        $deposit = Deposit::find($id);

        $amount = $deposit->amount;

        $user = $deposit->customer->id;
        $user_id = Customer::find($user);
        $user_balance = $user_id->balance;
        $update_bal = $user_balance + $amount;

        Deposit::find($id)->update([
            'status'=> 2,
        ]);

        Customer::find($user)->update([
            'balance'=>  $update_bal,
        ]);

        return back()->with('balance_added');



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
