<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Account::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Account::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return Account::findOrFail($account->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $account = Account::findOrFail($account->id);
        $account->edit();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account = Account::findOrFail($account->id);
        $account->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account = Account::findOrFail($account->id);
        $account->delete();
    }

    public function showBalance(Account $account)
    {
        $account = Account::findOrFail($account->id);
        return $account->balance;
    }

    public function deposit(Request $request, Account $account)
    {
        $account = Account::findOrFail($account->id);
        $account->balance = $account->balance + $request->value;
    }

    public function draw(Request $request, Account $account)
    {
        $account = Account::findOrFail($account->id);
        $account->balance = $account->balance - $request->value;
    }
}
