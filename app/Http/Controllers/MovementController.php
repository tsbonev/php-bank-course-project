<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movement;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $movements = Movement::where('account_id', '=', $request->get('account_id'))->get();
        return view('movements.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('movements.create', ['account_id' => $request->get('account_id')] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $account = new Movement([
            'account_id' => $request->get('account_id'),
            'amounts' => $request->get('amount'),
            'type' => $request->get('type')
          ]);
          $account->save();
          return redirect('/accounts')->with('success', 'Movement has been created');
    }
}
