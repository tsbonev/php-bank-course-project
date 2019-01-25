<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Movement;
use Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::where('user_id', '=', Auth::id())->get();
        foreach($accounts as $key){
            $amount = 0;
            
            $amount += Movement::where('account_id', '=', $key['id'])
            ->where('type', '=', 'Deposit')->sum('amounts');
            $amount -= Movement::where('account_id', '=', $key['id'])
            ->where('type', '=', 'Withdraw')->sum('amounts');
        

            $key['amount'] = $amount;
        }
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
          $account = new Account([
            'user_id' => Auth::id()
          ]);
          $account->save();
          return redirect('/accounts')->with('success', 'Account has been created');
    }
}
