<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    protected $prefix, $view; 

    public function __construct()
    {
        $this->view = 'panel.profile';
        $this->prefix = 'panel.profile';

        view()->share([
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    public function edit(Request $request)
    {
        return view("{$this->view}.edit", [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        Splade::toast("Profile saved.")->rightBottom()->autoDismiss(3);
        return Redirect::route("{$this->prefix}.edit")->with('status', 'profile-updated');
    }

    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Splade::toast("Account deleted.")->rightBottom()->autoDismiss(3);
        return Redirect::to('/');
    }
}
