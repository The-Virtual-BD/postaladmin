<?php

namespace App\Http\Controllers;

use App\Mail\NewUseMail;
use App\Mail\NewUserAdded;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\New_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:user', ['only' => ['index','create','store','edit','update','destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                User::with('roles')->whereHas(
                    'roles', function($q){
                        $q->where('name','user');
                    }
                )->get()
            )->addIndexColumn()->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'unique:users'],
            'nib' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $randomnumber =   rand(123456, 654321);
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
            'password' => Hash::make($randomnumber),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id
        ]);


        $details = [
            'name' => $user->firstname,
            'email' => $user->email,
            'password' => $randomnumber,
            'body' => 'Welcome! Please save these information below. We dont have a copy of it.',
        ];

        // try {

        //     $mail = Mail::to($user->email)->send(new NewUseMail($details));
        // } catch (\Exception $e) {

        //     return $e->getMessage();
        // }




        return view('users.index');
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
        return view('users.show', compact('user'));
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
        return view('users.edit', compact('user'));
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

        $user = User::find($id);
        $user->phone = $request->phone;
        $user->nib = $request->nib;
        $user->email = $request->email;
        $user->save();

        return view('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        $profile->delete();
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'User deleted successfylly !']);
    }
}
