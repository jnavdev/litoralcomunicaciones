<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\ChangePasswordRequest;
use App\Http\Requests\Admin\Profile\PersonalInformationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function personalInformation()
    {
        return view('admin.profile');
    }

    public function savePersonalInformation(PersonalInformationRequest $request)
    {
        $user = User::find(auth()->id());
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        return back()->with('success_message', 'Perfil actualizado exitosamente.');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(auth()->id());
        $user->update([
            'password' => bcrypt($request->input('new_password'))
        ]);

        return back()->with('success_message', 'Contraseña actualizada exitosamente.');
    }
}
