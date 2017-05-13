<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movement;
use App\User;
use App\UserMovement;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movements = Movement::all();
        return view('movements.index')->with('movements', $movements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('movements/create', ['movement' => new Movement]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|min:3',
            ]);
        $movement = new Movement($request->all());
        $movement->save();
        return redirect('movements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $movement = Movement::find($id);
        $user = User::find($id);
        $usermovement = UserMovement::find($id);
        $movements = Movement::all(['id', 'name']);
        $usermovements=$movement->usermovements;
        return view('movements/show', compact('movements', 'usermovements'))
          ->with('movement', $movement)
          ->with('user', $user)
          ->with('usermovement', $usermovement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $movement = Movement::findOrFail($id);
        return view('movements/edit')->with('movement', $movement);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|min:3',
            ]);
        $movement = Movement::findOrFail($id);
        $movement->update($request->all());
        return redirect('movements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $movement = Movement::findOrFail($id);
        $movement->delete();
        return redirect('movements');

    }
}
