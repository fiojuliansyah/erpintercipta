<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Models\Profile;
use App\Models\Jobhistory;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexAccountSettings()
    {
        $user = Auth::user();
        return view('desktop.profiles.account-settings',compact('user'));
    }

    public function index()
    {
        $user = Auth::user();
        return view('desktop.profiles.profiles',compact('user'));
    }

    public function registerProfile()
    {
        $agent = new Agent;
        $user = Auth::user();
    
        $existingAvatar = $user->profile->avatar ?? null;
    
        if ($agent->isMobile()) {
            return view('mobiles.register-profile', compact('user', 'existingAvatar'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.register-profile', compact('user', 'existingAvatar'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.register-profile', compact('user', 'existingAvatar'));
        }
    }    

    public function updateUserDetail(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $existingAvatar = $user->profile->avatar ?? null;
        
        $path1 = $existingAvatar;
        if ($request->hasFile('avatar')) {
            if ($existingAvatar && $existingAvatar !== 'default_avatar.jpg') {
                Storage::delete($existingAvatar);
            }
            $path1 = $request->file('avatar')->store('public/avatars');
        }

        $user->profile()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'avatar' => $path1,
                'nickname' => $request->nickname,
                'address' => $request->address,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'religion' => $request->religion,
                'person_status' => $request->person_status,
                'mother_name' => $request->mother_name,
                'stay_in' => $request->stay_in,
                'family_name' => $request->family_name,
                'family_address' => $request->family_address,
                'gender' => $request->gender,
                'weight' => $request->weight,
                'height' => $request->height,
                'hobby' => $request->hobby,
                'bank_account' => $request->bank_account,
                'bank_name' => $request->bank_name,
                'reference' => $request->reference,
                'reference_job' => $request->reference_job,
                'reference_relation' => $request->reference_relation,
                'reference_address' => $request->reference_address,
                'transfer' => $request->transfer
            ]
        );

        return Redirect::to('documents')->withInput();
    }

    public function show(Profile $profile)
    {
        $careers = Career::all();
        return view('desktop.profiles.show', compact('profile','careers'));
    }

}
