<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movement;
use App\UserMovement;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users/index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users/create');
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
            'email' => 'required|email'
            ]);
        $user = new User($request->all());
        $user->password = bcrypt('secret');
        $user->save();
        return redirect('users');
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
        $user = User::findOrFail($id);
        $movement = Movement::findOrFail($id);
        $usermovement = UserMovement::findOrFail($id);
        $users = User::all(['id', 'name']);
        $usermovements=$user->usermovements;
        return view('users/show', compact('users', 'usermovements'))
          ->with('user', $user)
          ->with('movement', $movement)
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
        $user = User::findOrFail($id);
        return view('users/edit')->with('user', $user);
    }

    /**
     * Update a newly created resource in storage.
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
            'email' => 'required|email'
            ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('users');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users');
    }
}
