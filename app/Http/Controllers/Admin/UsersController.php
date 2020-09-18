<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Auth;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
   
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }
        $roles = Role::all();
        return view('admin.users.edit')->with([
            'user'=>$user,
            'roles'=>$roles
        ]);
    }
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
       
        
        return redirect()->route('admin.users.index');
    }
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }
        $user ->roles()->detach();
        $user->delete();    
        return redirect()->route('admin.users.index');
    }
    public function ban(User $user)
    {
        if(Gate::denies('ban-users')){
            return redirect(route('admin.users.index'));
        }
        $user->ban([
            'comment' => 'Enjoy your ban!',
            'expired_at' => '+1 month'
        ]);
        
        return redirect()->route('admin.users.index');
    }
}
