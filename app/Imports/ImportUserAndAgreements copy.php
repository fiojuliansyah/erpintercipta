<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Profile;
use App\Models\Agreement;
use App\Models\Pkwt;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ImportUserAndAgreements implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if ($row[0] === 'nik_number' && $row[1] === 'email') {
            return null; // Skip the header row
        }

        // Check if it's a user or agreement
        if (!empty($row[1])) {
            // Importing user
            return $this->importUser($row);
        } else {
            // Importing agreement
            return $this->importAgreement($row);
        }
    }

    private function importUser($row)
    {
        // Check if nik_number is null
        if ($row[0] === null) {
            // If nik_number is null, skip this row
            return null;
        }

        // Find user based on email address
        $existingUser = User::where('email', $row[1])->first();

        if ($existingUser) {
            // If user exists, update user data
            $existingUser->update([
                'nik_number' => $row[0],
                'name' => $row[2],
                'password' => Hash::make($row[3]), // Hash password for security
            ]);
            $user = $existingUser;
        } else {
            // Create new user if not found
            $user = User::create([
                'nik_number' => $row[0],
                'email' => $row[1],
                'name' => $row[2],
                'password' => Hash::make($row[3]), // Hash password for security
            ]);
        }

        // Create or update profile associated with the user
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'department' => $row[4],
                'employee_nik' => $row[5],
                'address' => $row[6],
                'birth_place' => $row[7],
                'birth_date' => Date::excelToDateTimeObject($row[8])->format('Y-m-d'), // Change format as needed
                'gender' => $row[9],
            ]);

        return $user; // Return User model if needed
    }

    private function importAgreement($row)
    {
        $existingAgreement = Agreement::whereHas('user.profile', function ($query) use ($row) {
            $query->where('department', $row[4]);
        })
            ->where('department', $row[4])
            ->first();

        if ($existingAgreement) {
            // Update existing agreement
            $existingAgreement->update([
                'romawi' => $row[11],
                'year' => $row[12],
                'area' => $row[13],
                'start_date' => Date::excelToDateTimeObject($row[14])->format('Y-m-d'),
                'end_date' => Date::excelToDateTimeObject($row[15])->format('Y-m-d'),
                'length_of_work' => $row[16],
                'responsible' => $row[17],
                'salary' => $row[18],
                'department_allowance' => $row[19],
                'attendance_allowance' => $row[20],
                'comunication_allowance' => $row[21],
                'beauty_allowance' => $row[22],
                'food_allowance' => $row[23],
                'transport_allowance' => $row[24],
                'location_allowance' => $row[25],
                'other_non_fix_allowance' => $row[26],
                'penalty' => $row[27],
                'addendum_id' => $row[28],
            ]);

            // Retrieve user associated with the agreement
            $user = $existingAgreement->user;
        } else {
            // Create new agreement
            $user = User::whereHas('profile', function ($query) use ($row) {
                $query->where('department', $row[4]);
            })->first();

            if ($user) {
                $agreement = Agreement::create([
                    'user_id' => $user->id,
                    'department' => $row[4],
                    'title' => 'PKWT' . $row[13],
                    'romawi' => $row[11],
                    'year' => $row[12],
                    'area' => $row[13],
                    'start_date' => Date::excelToDateTimeObject($row[14])->format('Y-m-d'),
                    'end_date' => Date::excelToDateTimeObject($row[15])->format('Y-m-d'),
                    'length_of_work' => $row[16],
                    'responsible' => $row[17],
                    'salary' => $row[18],
                    'department_allowance' => $row[19],
                    'attendance_allowance' => $row[20],
                    'comunication_allowance' => $row[21],
                    'beauty_allowance' => $row[22],
                    'food_allowance' => $row[23],
                    'transport_allowance' => $row[24],
                    'location_allowance' => $row[25],
                    'other_non_fix_allowance' => $row[26],
                    'penalty' => $row[27],
                    'addendum_id' => $row[28],
                ]);
            } else {
                // Handle case when user with specified department does not exist
                return null;
            }
        }

        if ($user) {
            // Now, create or update PKWT
            $pkwt = Pkwt::updateOrCreate(
                ['user_id' => $user->id, 'agreement_id' => $agreement->id],
                ['pkwt_number' => $row[10]]
                // Add other mappings as needed
            );
        }

        return $agreement; // Return Agreement model if needed
    }

    public function startRow(): int
    {
        return 2; // Start from row 2 (skip the header row)
    }
}
