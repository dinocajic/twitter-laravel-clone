<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(10),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
        $attributes = $this->validate($request, [
            'name'     => ['string', 'required', 'max:255'],
            'username' => ['string', 'required', 'max:255', 'unique:users,username,' . $user->id],
            'avatar'   => ['file'],
            'email'    => ['string', 'required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['string', 'min:6', 'max:255', 'confirmed', 'nullable'],
        ]);

        if ($request->avatar) {
            $attributes['avatar'] = $request->avatar->store('avatars');
        }

        if ($attributes['password'] == '') {
            $attributes['password'] = $user->password;
        } else {
            $attributes['password'] = Hash::make($request->password);
        }

        $user->update($attributes);

        return redirect( route('profile', $user) );
    }
}
