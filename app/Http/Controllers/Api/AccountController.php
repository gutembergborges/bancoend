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
    public function show($number)
    {
        if($account = Account::where('number', $number)->first()) {
            return $account;
        } else {
            return 'Conta inexistente. Tente novamente.';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $number)
    {
        $account = Account::where('number', $number)->first();
        $account->update($request->all());

        return $account;
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

    public function deposit(Request $request, $number)
    {
        if(Account::where('number', $number)->first()) {
            $account = Account::where('number', $number)->first();
            $account->balance = $account->balance + $request->balance;
            $account->save();

            return $account;
        } else {
            return 'Conta inexistente. Tente novamente.';
        }
    }

    public function draw(Request $request, $number)
    {
        if($account = Account::where('number', $number)->first()) {
            if($account->balance >= $request->balance) {
                $account->balance = $account->balance - $request->balance;
                $account->save();

                return $account;
            } else {
                return 'Saldo Insuficiente.';
            }
        } else {
            return 'Conta inexistente. Tente novamente.';
        }
    }
}
