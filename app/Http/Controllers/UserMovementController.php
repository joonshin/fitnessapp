<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMovement;
use App\User;
use App\Movement;

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
        $usermovements = UserMovement::with('user', 'movement')->get();
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
        $users = User::all(['id', 'name']);
        $movements = Movement::all(['id', 'name']);
        return view('usermovements/create', compact('users', 'movements'), ['usermovement' => new UserMovement]);
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
            'weight' => 'nullable|numeric',
            'time' => 'nullable|integer',
            'reps' => 'nullable|integer'
            ]);
        $data = $request->all();
        if ($data['units'] == 'kgs') {
          $data['weight'] = $data['weight'] * 2.20462
        }

        if (empty($data['weight'])) {
          $data['weight'] = null;
        }

        $timeElements = array_reverse(explode(':', $data['time']));
        $time = 0;
        for ($i=0 ; $i<count($timeElements) ; $i++) {
          $time += $timeElements[$i] * (60**i);
        }
        $data['time'] = $time;

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
        $usermovement = UserMovement::with('user', 'movement')->findOrFail($id);
        return view('usermovements/show', compact('usermovement'));
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
        $users = User::all(['id', 'name']);
        $movements = Movement::all(['id', 'name']);
        return view('usermovements/edit', compact('users', 'movements'))->with('usermovement', $usermovement);
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
            'weight' => 'nullable|numeric',
            'time' => 'nullable|integer',
            'reps' => 'nullable|integer'
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
