<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Services\FileUpload;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    function __construct(private Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, FileUpload $fileUpload): RedirectResponse
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'country' => ['required', 'string'],
            'preferred_cur' => ['required', 'string'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user = $request->user();

        if($request->file('passport')){
            $request->validate([
                'passport' => 'required|mimes:png,jpg,jpeg,|max:2048'
            ]);
            $path = $fileUpload->uploadFile($request->file('passport'), 'profile');
            $user->update([
                'photo_url' => $path,
            ]);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'country_id' => $request->country,
            'preferred_cur' => $request->preferred_cur,
            'address' => $request->address,
        ]);
        toast('Profile details was sucessfully updated', 'success');
        return redirect()->back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function readNotifications($id = null)
    {
        $user = auth()->user();

        $user->unreadNotifications->markAsRead();

        $view = [
            'notifications' => $user->notifications,
            '_user' => $this->user(),
            'category' => $this->category->all(),
            'country' => $this->getCountry(),
        ];

        return view('main.notifications', $view);

    }

    public function updateUserProfilePhoto(Request $request, FileUpload $fileUpload)
    {
        $path = null;
        if($request->file('passport')){
            $request->validate([
                'passport' => 'required|mimes:png,jpg,jpeg,|max:2048'
            ]);
            $path = $fileUpload->uploadFile($request->file('passport'), 'profile');
        }
        $user = User::where('id', $this->user()->id);

        $user->update([
            'photo_url' => $path,
        ]);
        toast('Profile Photo was sucessfully updated', 'success');
        return redirect()->back();
    }
}
