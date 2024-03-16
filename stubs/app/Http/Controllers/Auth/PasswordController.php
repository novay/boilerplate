<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ], [
            'required' => ___('Kolom ini harus diisi.')
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']), 
            'plain' => encrypt($validated['password'])
        ]);

        Splade::toast("Password saved.")->rightBottom()->autoDismiss(3);
        return back()->with('status', 'password-updated');
    }
}
