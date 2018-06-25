<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserInformation;

class UserInfo extends Controller
{
    //
     public function index()
    {
        $users = UserInformation::latest()->paginate(10);
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        UserInfo::create($request->all());
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserInformation $UserInfo)
    {
        return view('users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInformation $user)
    {
        $users= UserInformation::find($user);
        return view('users.edit',compact('users'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UserInformation $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update($request->all());
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserInfo::destroy($id);
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

}
