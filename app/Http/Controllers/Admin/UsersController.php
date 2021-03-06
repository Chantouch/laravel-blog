<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersRequest;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Show the application users index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(50)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.users.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(UsersRequest $request)
    {

        $user = User::create(array_filter($request->only(['name', 'email', 'password'])));
        $role_ids = array_values($request->get('roles', []));
        $user->roles()->sync($role_ids);

        return redirect()->route('admin.users.edit', $user)->withSuccess(__('users.created'));
    }

    /**
     * Display the specified resource edit form.
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param UsersRequest $request
     * @param User $user
     * @return
     */
    public function update(UsersRequest $request, User $user)
    {
        $user->update(array_filter($request->only(['name', 'email', 'password'])));

        $role_ids = array_values($request->get('roles', []));
        $user->roles()->sync($role_ids);

        return redirect()->route('admin.users.edit', $user)->withSuccess(__('users.updated'));
    }
}
