<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profiles.index',compact('user'));
    }


    public function updateUserDetail(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if ($request->file('avatar') == null) {
            $path1 = "";
        }else{
            $path1 = $request->file('avatar')->store('public/avatars');  
        }

        if ($request->file('thumbnail') == null) {
            $path2 = "";
        }else{
            $path2 = $request->file('thumbnail')->store('public/thumbnails');  
        }

        if ($request->file('esign') == null) {
            $path3 = "";
        }else{
            $path3 = $request->file('esign')->store('public/esigns'); 
        }

        $user->profile()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'avatar' => $path1,
                'thumbnail' => $path2,
                'esign' => $path3,
                'bio' => $request->bio,
                'address' => $request->address,
                'phone' => $request->phone,
            ]
        );
        return redirect()->route('profiles.index')
        ->with('success','Profile updated successfully');
    }
}
