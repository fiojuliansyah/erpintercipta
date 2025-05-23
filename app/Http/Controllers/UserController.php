<?php
    
namespace App\Http\Controllers;
    
use DB;
use Hash;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Arr;
use App\Imports\ImportUsers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

    
class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|product-create|user-edit|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $notification  
        return view('desktop.users.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('desktop.users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik_number' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->id;
        $user->assignRole($request->input('roles'));
        // Notification::create ([
        //     'user_id' => 1,
        //     'title' => 'Add User',
        //     'desc' => 'Add User Success'
        // ]);


        // Notification::create ([
        //     'user_id' => auth()->user()->id,
        //     'title' => 'Add User',
        //     'desc' => 'Add User Success'
        // ]);
        // Buat tautan untuk tampilan data pelamar dengan ID yang baru saja dibuat
        $qrLink = route('applicants.show', ['applicant' => $user->id]);

        // Lanjutkan dengan menghasilkan QR code seperti sebelumnya
        $qrCode = QrCode::size(200)->generate($qrLink);

        $user->qr_link = $qrCode;

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    public function QRUpdate(Request $request, $id)
    {   
        // Cari data pelamar berdasarkan ID
        $user = User::find($id);

        // Pastikan data pelamar ditemukan sebelum melanjutkan
        if (!$user) {
            return redirect()->route('users.index')
                            ->with('error', 'user not found');
        }

        // Buat tautan untuk tampilan data pelamar dengan ID yang ditemukan
        $qrLink = route('applicants.show', ['applicant' => $user->id]);

        // Lanjutkan dengan menghasilkan QR code seperti sebelumnya
        $qrCode = QrCode::size(200)->generate($qrLink);

        // Simpan tautan QR code ke dalam basis data
        $user->qr_link = $qrCode;
        $user->save();

        return redirect()->route('applicants.index')
                        ->with('success', 'Candidate updated successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('desktop.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('desktop.users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik_number' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    
        // Menghapus profile yang terkait dengan user yang akan dihapus
        Profile::where('user_id', $user->id)->delete();
    
        // Menghapus user setelah profile terkait dihapus
        $user->delete();
    
        return redirect()->route('users.index')
                        ->with('success', 'User and associated Profile deleted successfully');
    }    

    public function import(Request $request)
    {
        Excel::import(new ImportUsers, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function userProfileDestroy()
    {
        // Menghapus pengguna yang tidak memiliki roles dan tidak memiliki profile->department
        $users = User::doesntHave('roles')
                      ->whereHas('profile', function ($query) {
                          $query->whereNull('department');
                      })
                      ->get();

        foreach ($users as $user) {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Users without roles and profile->department have been deleted.');
    }
}