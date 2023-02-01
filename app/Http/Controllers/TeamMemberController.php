<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;

class TeamMemberController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:team', ['only' => ['index','create','store','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = TeamMember::all();
        return view('teamMembers.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teamMembers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamMemberRequest $request)
    {
        $member = new TeamMember();
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->email = $request->email;
        $member->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'images/member/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $member->photo = $fileurl;
        }
        $member->save();

        return redirect()->route('teamMembers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {
        return view('teamMembers.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamMemberRequest  $request
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        if ($request->status) {
            if ($request->status == 1) {
                $teamMember->status = 2;
            }else {
                $teamMember->status = 1;
            }
            $teamMember->update();
            return redirect()->route('teamMembers.index');
        }

        $teamMember->name = $request->name;
        $teamMember->designation = $request->designation;
        $teamMember->email = $request->email;
        $teamMember->phone = $request->phone;

        if ($request->file('photo')) {
            unlink($teamMember->photo);
            $file = $request->file('photo');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'images/member/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $teamMember->photo = $fileurl;
        }
        $teamMember->update();

        return redirect()->route('teamMembers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        unlink($teamMember->photo);
        $teamMember->delete();
        return redirect()->route('teamMembers.index');

    }
}
