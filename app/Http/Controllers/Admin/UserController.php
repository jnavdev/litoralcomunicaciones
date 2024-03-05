<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreRequest $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return to_route('users.index')->with('success_message', 'Registro guardado exitosamente.');
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if ($request->input('password')) {
            $user->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return to_route('users.index')->with('success_message', 'Registro actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return to_route('users.index')->with('success_message', 'Registro eliminado exitosamente.');
    }
}
