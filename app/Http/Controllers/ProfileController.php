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

        if ($agent->isMobile()) {
            return view('mobiles.register-profile',compact('user'));
        } elseif ($agent->isDesktop()) {
            return view('desktop.register-profile',compact('user'));
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.register-profile',compact('user'));
        }
        
    }


    public function updateUserDetail(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $existingAvatar = $user->profile->avatar ?? null;
        $existingCardKTP = $user->profile->card_ktp ?? null;
        $existingCardIjazah = $user->profile->card_ijazah ?? null;
        $existingCardSKCK = $user->profile->card_skck ?? null;
        $existingCardCertificate = $user->profile->card_certificate ?? null;
        $existingCardSIM = $user->profile->card_sim ?? null;
        $existingCardNPWP = $user->profile->card_npwp ?? null;
        $existingDocumentA = $user->profile->add_document_a ?? null;
        $existingDocumentB = $user->profile->add_document_B ?? null;
        $existingDocumentC = $user->profile->add_document_c ?? null;
        $existingTransfer = $user->profile->transfer ?? null;
        $existingCardFamily = $user->profile->card_family ?? null;
        

        $path1 = $existingAvatar;
        if ($request->hasFile('avatar')) {
            if ($existingAvatar && $existingAvatar !== 'default_avatar.jpg') {
                Storage::delete($existingAvatar);
            }
            $path1 = $request->file('avatar')->store('public/avatars');
        }

        $path2 = $existingCardKTP;
        if ($request->hasFile('card-ktp')) {
            if ($existingCardKTP && $existingCardKTP !== 'default_avatar.jpg') {
                Storage::delete($existingCardKTP);
            }
            $path2 = $request->file('card-ktp')->store('public/ktp');
        }

        $path3 = $existingCardIjazah;
        if ($request->hasFile('card_ijazah')) {
            if ($existingCardIjazah && $existingCardIjazah !== 'default_avatar.jpg') {
                Storage::delete($existingCardIjazah);
            }
            $path3 = $request->file('card_ijazah')->store('public/ijazah');
        }

        $path4 = $existingCardSKCK;
        if ($request->hasFile('card_skck')) {
            if ($existingCardSKCK && $existingCardSKCK !== 'default_avatar.jpg') {
                Storage::delete($existingCardSKCK);
            }
            $path4 = $request->file('card_skck')->store('public/skck');
        }

        $path5 = $existingCardCertificate;
        if ($request->hasFile('card_certificate')) {
            if ($existingCardCertificate && $existingCardCertificate !== 'default_avatar.jpg') {
                Storage::delete($existingCardCertificate);
            }
            $path5 = $request->file('card_certificate')->store('public/certificate');
        }

        $path6 = $existingCardSIM;
        if ($request->hasFile('card_sim')) {
            if ($existingCardSIM && $existingCardSIM !== 'default_avatar.jpg') {
                Storage::delete($existingCardSIM);
            }
            $path6 = $request->file('card_sim')->store('public/sim');
        }

        $path7 = $existingCardNPWP;
        if ($request->hasFile('card_npwp')) {
            if ($existingCardNPWP && $existingCardNPWP !== 'default_avatar.jpg') {
                Storage::delete($existingCardNPWP);
            }
            $path7 = $request->file('card_npwp')->store('public/npwp');
        }

        $path8 = $existingDocumentA;
        if ($request->hasFile('add_document_a')) {
            if ($existingDocumentA && $existingDocumentA !== 'default_avatar.jpg') {
                Storage::delete($existingDocumentA);
            }
            $path8 = $request->file('add_document_a')->store('public/add_documents');
        }

        $path9 = $existingDocumentB;
        if ($request->hasFile('add_document_b')) {
            if ($existingDocumentB && $existingDocumentB !== 'default_avatar.jpg') {
                Storage::delete($existingDocumentB);
            }
            $path9 = $request->file('add_document_b')->store('public/add_documents');
        }

        $path10 = $existingDocumentC;
        if ($request->hasFile('add_document_c')) {
            if ($existingDocumentC && $existingDocumentC !== 'default_avatar.jpg') {
                Storage::delete($existingDocumentC);
            }
            $path10 = $request->file('add_document_c')->store('public/add_documents');
        }

        $path11 = $existingCardFamily;
        if ($request->hasFile('card_family')) {
            if ($existingCardFamily && $existingCardFamily !== 'default_avatar.jpg') {
                Storage::delete($existingCardFamily);
            }
            $path11 = $request->file('card_family')->store('public/card_families');
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
                'card_ktp' => $path2,
                'card_family' => $path11,
                'family_number' => $request->family_number,
                'card_ijazah' => $path3,
                'card_skck' => $path4,
                'active_date' => $request->active_date,
                'card_certificate' => $path5,
                'card_sim' => $path6,
                'card_npwp' => $path7,
                'npwp_number' => $request->npwp_number,
                'add_name_document_a' => $request->add_name_document_a,
                'add_document_a' => $path8,
                'add_name_document_b' => $request->add_name_document_b,
                'add_document_b' => $path9,
                'add_name_document_c' => $request->add_name_document_c,
                'add_document_c' => $path10,
                'company_name_a' => $request->company_name_a,
                'period_a' => $request->period_a,
                'position_a' => $request->position_a,
                'salary_a' => $request->salary_a,
                'company_name_b' => $request->company_name_b,
                'period_b' => $request->period_b,
                'position_b' => $request->position_b,
                'salary_b' => $request->salary_b,
                'company_name_c' => $request->company_name_c,
                'period_c' => $request->period_c,
                'position_c' => $request->position_c,
                'salary_c' => $request->salary_c,
                'company_name_d' => $request->company_name_d,
                'period_d' => $request->period_d,
                'position_d' => $request->position_d,
                'salary_d' => $request->salary_d,
                'transfer' => $request->transfer
            ]
        );

        return Redirect::to('/dashboard');
    }

    public function show(Profile $profile)
    {
        $careers = Career::all();
        return view('desktop.profiles.show', compact('profile','careers'));
    }

}
