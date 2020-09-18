<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
Class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $user =  Auth::user();

       
    
        return view('profile');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //var_dump($user);
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' =>'required',
            'image' =>'required'
        ));
        //dd('you are here');
        $user = Auth::user();
        $user->update($request->all());
        //$user->save();
        //$user->update($request->has('password') ? $request->all() : $request->except(['password']));
       /* dd($user);
        $user->name = $request->input('name');
        $user->email =$request->input('email');
        $user->password = $request->input('password');
        $user->image = $request->input('image');
        $user->save();*/
      
     
        return redirect()->route('profile');
        
    }


}
