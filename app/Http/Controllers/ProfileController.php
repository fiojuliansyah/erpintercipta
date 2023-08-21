<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Jobhistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function indexAccountSettings()
    {
        $user = Auth::user();
        return view('profiles.account-settings',compact('user'));
    }

    public function index()
    {
        $user = Auth::user();
        return view('profiles.profiles',compact('user'));
    }

    public function registerProfile()
    {
        $user = Auth::user();
        return view('register-profile',compact('user'));
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
        

        if ($request->hasFile('avatar')) {
            $path1 = $request->file('avatar')->store('public/avatars');
        } else {
            $path1 = $existingAvatar;
        }

        if ($request->hasFile('card_ktp')) {
            $path2 = $request->file('card_ktp')->store('public/ktp');
        } else {
            $path2 = $existingCardKTP;
        }

        if ($request->hasFile('card_ijazah')) {
            $path3 = $request->file('card_ijazah')->store('public/ijazah');
        } else {
            $path3 = $existingCardIjazah;
        }

        if ($request->hasFile('card_skck')) {
            $path4 = $request->file('card_skck')->store('public/skck');
        } else {
            $path4 = $existingCardSKCK;
        }

        if ($request->hasFile('card_certificate')) {
            $path5 = $request->file('card_certificate')->store('public/certificate');
        } else {
            $path5 = $existingCardCertificate;
        }

        if ($request->hasFile('card_sim')) {
            $path6 = $request->file('card_sim')->store('public/sim');
        } else {
            $path6 = $existingCardSIM;
        }

        if ($request->hasFile('card_npwp')) {
            $path7 = $request->file('card_npwp')->store('public/npwp');
        } else {
            $path7 = $existingCardNPWP;
        }

        if ($request->hasFile('add_document_a')) {
            $path8 = $request->file('add_document_a')->store('public/add_documents');
        } else {
            $path8 = $existingDocumentA;
        }

        if ($request->hasFile('add_document_b')) {
            $path9 = $request->file('add_document_b')->store('public/add_documents');
        } else {
            $path9 = $existingDocumentB;
        }

        if ($request->hasFile('add_document_c')) {
            $path10 = $request->file('add_document_c')->store('public/add_documents');
        } else {
            $path10 = $existingDocumentC;
        }

        if ($request->hasFile('transfer')) {
            $path10 = $request->file('transfer')->store('public/transfers');
        } else {
            $path10 = $existingDocumentC;
        }

        if ($request->hasFile('card_family')) {
            $path11 = $request->file('card_family')->store('public/card_families');
        } else {
            $path11 = $existingCardFamily;
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
                'weight' => $request->gender,
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
                'nik_number' => $request->nik_number,
                'card_family' => $path11,
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

        return redirect()->url('/dashboard');
    }
}
