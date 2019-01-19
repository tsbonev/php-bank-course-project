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
        echo $request->get('account_id');
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
        echo $request->get('account_id');
        return view('movements.create', ['account_id' => $request->get('account_id')] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int @account_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $account_id)
    {
        $account = new Movement([
            'account_id' => $account_id,
            'amounts' => $request->get('amounts'),
            'type' => $request->get('type')
          ]);
          $account->save();
          return redirect('/accounts')->with('success', 'Movement has been created');
    }
}
