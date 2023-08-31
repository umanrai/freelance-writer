<?php

namespace App\Http\Controllers\Admin;

use App\Misc\Role;
use App\User;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

   public function index( Request $request)
   {
       $users = User::query();

       $roleId = $request->get('role_id');
       if (! is_null($roleId)) {
           $users = $users->where( 'role_id', '=', $roleId );
       }

        $users = $users->paginate(5);
        $data['roles'] = Role::all();
        return view('admin.user.index', compact('users', 'data'));
   }

   public function create()
   {
       $data['roles'] = Role::all();
        return view('admin.user.create', compact('data'));
   }

   public function store(StoreRequest $request)
   {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);
       return redirect()->route('user.index')->with('success','User created successfully.');
   }

    public function edit(User $user)
   {
       $data['roles'] = Role::all();
    // Route Model Binding
        return view('admin.user.edit', compact('user', 'data'));
   }

    public function update(User $user, UpdateRequest $request)
   {
        $data = $request->all();

           if ($request->get('password')) {
            $data['password'] = bcrypt($data['password']);
           } else {
               $data = $request->except('password');
           }

        $user->update($data);

        return back();
   }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
            ->with('success','User deleted successfully.');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

}
