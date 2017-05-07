<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMovement;

class UserMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usermovements = UserMovement::all();
        return view('usermovements/index')->with('usermovements', $usermovements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('usermovements/create', ['usermovement' => new UserMovement]);
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
            'user_id' => 'required|integer',
            'movement_id' => 'required|integer',
            'weight' => 'nullable',
            'time' => 'nullable',
            'reps' => 'nullable'
            ]);
        $usermovement = new UserMovement($request->all());
        $usermovement->save();
        return redirect('usermovements');
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
        $usermovement = UserMovement::findOrFail($id);
        return view('usermovements/show')->with('usermovement', $usermovement);
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
        $usermovement = UserMovement::findOrFail($id);
        return view('usermovements/edit')->with('usermovement', $usermovement);
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
            'user_id' => 'required|integer',
            'movement_id' => 'required|integer',
            'weight' => 'nullable',
            'time' => 'nullable',
            'reps' => 'nullable'
            ]);
        $usermovement = UserMovement::findOrFail($id);
        $usermovement->update($request->all());
        return redirect('usermovements');
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
        $usermovement = UserMovement::findOrFail($id);
        $usermovement->delete();
        return redirect('usermovements');
    }
}
