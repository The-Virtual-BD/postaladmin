<?php

namespace App\Http\Controllers;

use App\Mail\NewUseMail;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:admin', ['only' => ['index','create','store','edit','update','destroy']]);
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                User::with('roles')->whereHas(
                    'roles', function($q){
                        $q->where('name', 'admin');
                    }
                )->get()
            )->addIndexColumn()->make(true);
        }
        return view('admins.index');
    }


    public function create()
    {
        return view('admins.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $suite = date('mds');
        if (User::count() > 0) {
            $lastuser = User::latest()->first('suite');
            $suite = $lastuser->suite + 1;
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'name' => $request->name,
            'nib' => $request->nib,
            'suite' => $suite,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Creating profile for this user
        $profile = Profile::create([
            'user_id' => $user->id
        ]);

        // Assigning admin role
        $role = Role::where('name','admin')->first();
        $user->assignRole([$role->id]);

        // Information that will sent to new user
        $details = [
            'name' => $user->firstname.$user->lastname,
            'email' => $user->email,
            'password' => $request->password,
            'body' => 'Welcome! Please save these information below and dont share with anyone. We dont have a copy of it.',
        ];

        // Sending Mail
        try {
            $mail = Mail::to($user->email)->send(new NewUseMail($details));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('admins.index');
    }


    // Editing id
    public function edit ($id)
    {
        $admin = User::find($id);

        return view('admins.edit',compact('admin'));
    }

    public function update (Request $request, User $user)
    {
        if ($request->password) {
            $request->validate([
                'password' => ['required','confirmed', Rules\Password::defaults()],
            ]);

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            // Information that will sent to new user
            $details = [
                'name' => $user->firstname.$user->lastname,
                'email' => $user->email,
                'password' => $request->password,
                'body' => 'Hello,'.$user->firstname.'! Your Password Updated. Please save these informations and dont share with anyone. We dont have a copy of it.',
            ];
            // Sending Mail
            try {
                $mail = Mail::to($user->email)->send(new NewUseMail($details));
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            return redirect()->route('admins.index');
        }

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'name' => $request->name,
            'nib' => $request->nib,
            'email' => $request->email,
        ]);



        // Information that will sent to new user
        $details = [
            'name' => $user->firstname.$user->lastname,
            'email' => $user->email,
            'password' => $request->password,
            'body' => 'Hello,'.$user->firstname.'! Your information Updated. Please save these informations and dont share with anyone. We dont have a copy of it.',
        ];

        // Sending Mail
        try {
            $mail = Mail::to($user->email)->send(new NewUseMail($details));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->back();
    }
}
