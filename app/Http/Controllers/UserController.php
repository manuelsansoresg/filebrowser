<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = 0;
        return view('form_users', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data_user                = $request->data;
        $data_user['password']    = bcrypt($request->password);

        $user = new User($data_user);
        $user->save();
        return redirect('/home');
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
    }

    public function redirectUserEdit($type)
    {
        return  redirect('/admin/users/'.Auth::user()->id.'/edit/'.$type);
    }

    public function redirectPasswordEdit($type)
    {
        return  redirect('/admin/users/pass/'.Auth::user()->id.'/edit/'.$type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $type = 0)
    {
        if ($type == 1 && $id != Auth::user()->id) {
            return  redirect('/home');
        }
        $user = User::find($id);
        return view('form_users', compact('user', 'type'));
    }

    public function passEdit($user_id, $type = 0)
    {
        if ($type == 1 && $user_id != Auth::user()->id) {
            return  redirect('/home');
        }
        $user = User::find($user_id);
        return view('form_users_pass', compact('user', 'type'));
    }

    public function passStore($user_id, Request $request)
    {
        $user = User::find($user_id);
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->data);
        $user->update();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/home');
    }
}
