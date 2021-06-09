<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserProfileImageRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function updateAvatar(UserProfileImageRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $this->deleteUserImage();
            $avatar = $request->avatar->getClientOriginalName();
            $filename = time() . '-' . $avatar;
            $request->avatar->storeAs('avatar', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }
        return redirect()->route('admin.profile')
            ->with('success-msg', 'Your profile image updated successfully.');
    }

    protected function deleteUserImage()
    {
        if (auth()->user()->avatar) {
            Storage::delete('public/avatar/' . auth()->user()->avatar);
        }
    }

    public function updateProfile(UpdateProfileRequest $request) 
    {
        $user = Auth::user();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->update();
        return redirect()->route('admin.profile')
        ->with('success', 'Profile updated successfully!');
        // ->with('warning', 'This is currently disabled in demo mode.');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password'  => 'required',
            'new_password'      => 'required|min:6',
            'confirm_password'  => 'required|same:new_password']);

        $user = Auth::user();
        $current_password   = $request->current_password;
        $new_password       = $request->new_password;

        if(Hash::check($current_password, $user->getAuthPassword())) {
            $user->password = bcrypt($new_password);
            $user->update();
            return back()->with('success', 'Password changed successfully.');
        }

        return back()->with('error', 'Incorrect old password. Try again');
    }
}
