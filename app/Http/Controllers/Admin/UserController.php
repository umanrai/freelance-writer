<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

   public function index()
   {
        $users = User::all();
        return view('admin.user.index', compact('users'));
   }

   public function create()
   {
        return view('admin.user.create');
   }

   public function store(StoreRequest $request)
   {

        $data = $request->all();
           $data['password'] = bcrypt($data['password']);

        User::create($data);
        return back();
   }

    public function edit(User $user)
   {
    // Route Model Binding
        return view('admin.user.edit', compact('user'));
   }

    public function update(User $user, UpdateRequest $request)
   {

        $data = $request->all();

           if ($request->get('password')) {
            $data['password'] = bcrypt($data['password']);
           }

        $user->update(array_filter($data));

        return back();
   }

}
