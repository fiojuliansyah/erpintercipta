<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;

class AttendanceController extends Controller
{
    public function indexClockIn()
    {
        return view('mobiles.attendance.clockin');
    }

    public function indexClockOut()
    {
        return view('mobiles.attendance.clockout');
    }

    public function attendance()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
    
        // Mendapatkan tanggal saat ini
        $currentDate = Carbon::now()->toDateString();

        $logs = Attendance::where('user_id', $userId)
                    ->whereDate('date', $currentDate)
                    ->get();
    
        // Mencari attendance logs berdasarkan user_id yang sesuai dengan ID pengguna yang login dan tanggal sesuai dengan tanggal saat ini
        $clockInStatus = Attendance::where('user_id', $userId)
                        ->whereDate('date', $currentDate)
                        ->whereNotNull('clock_in')
                        ->exists();
    
        $clockOutStatus = Attendance::where('user_id', $userId)
                        ->whereDate('date', $currentDate)
                        ->whereNotNull('clock_out')
                        ->exists();
    
        return view('mobiles.attendance.get', compact('clockInStatus', 'clockOutStatus', 'logs'));
    }

    public function clockIn(Request $request)
    {
        $current_date = date('Y-m-d');
        $current_time = date('H:i:s');
        $user = Auth::user();
        $path = 'public/attendances/' . $user->name . '_' . time() . '_in.png';
    
        // Decode data URL gambar ke dalam format gambar yang sesungguhnya
        $exploded = explode(',', $request->input('image_in'));
        $imageEncoded = count($exploded) > 1 ? $exploded[1] : null;
        $image = base64_decode($imageEncoded);
    
        // Simpan gambar ke storage
        Storage::put($path, $image);
    
        // Simpan data ke dalam database
        $attendance = new Attendance();
        $attendance->user_id = $user->id;
        $attendance->date = $current_date;
        $attendance->image_in = $path;
        $attendance->clock_in = $current_time;
        $attendance->long_in = $request->input('long_in');
        $attendance->lat_in = $request->input('lat_in');
        $attendance->save();

        sleep(1);
    
        return view('mobiles.home');
    }

    public function clockOut(Request $request)
    {
        $current_time = date('H:i:s');
        $user = Auth::user();

        // Mendapatkan entri terakhir untuk user yang sedang login
        $lastAttendance = Attendance::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastAttendance) {
            // Update data clock_out
            $lastAttendance->clock_out = $current_time;
            $lastAttendance->save();

            // Decode data URL gambar keluar ke dalam format gambar yang sesungguhnya
            $path = 'public/attendances/' . $user->name . '_' . time() . '_out.png';
            $exploded = explode(',', $request->input('image_out'));
            $imageEncoded = count($exploded) > 1 ? $exploded[1] : null;
            $image = base64_decode($imageEncoded);

            // Simpan gambar ke storage
            Storage::put($path, $image);

            // Update data image_out
            $lastAttendance->image_out = $path;
            $lastAttendance->save();
            
            sleep(1);
            return view('mobiles.home');
        }

        return redirect()->back()->with('error', 'Tidak ada data untuk diupdate.');
    }

    
}
