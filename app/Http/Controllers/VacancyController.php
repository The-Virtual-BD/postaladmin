<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Vacancy::query())
                    ->addIndexColumn()
                    ->make(true);

        }
        $islands = [
            'Abaco'=>'Abaco',
            'Acklins'=>'Acklins',
            'Andros'=>'Andros',
            'Berry Islands'=>'Berry Islands',
            'Bimini'=>'Bimini',
            'Cat Island'=>'Cat Island',
            'Crooked Island'=>'Crooked Island',
            'Eleuthera'=>'Eleuthera',
            'Exuma'=>'Exuma',
            'Grand Bahama'=>'Grand Bahama',
            'Inagua'=>'Inagua',
            'Long Cay'=>'Long Cay',
            'Long Island'=>'Long Island',
            'Mayaguana'=>'Mayaguana',
            'New Providence'=>'New Providence',
            'Ragged Island'=>'Ragged Island',
            'Rum Cay'=>'Rum Cay',
            'San Salvador'=>'San Salvador'];
        $jobTypes =['1'=>'Full Time','2'=>'Part Time','3'=>'Remote'];

        return view('vacancies.index',compact('islands','jobTypes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVacancyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacancyRequest $request)
    {


        $data = [
            'jobTitle' => $request->jobTitle,
            'island' => $request->island,
            'vacancy' => $request->vacancy,
            'jobType' => $request->jobType,
            'lastDate' => $request->lastDate,
            'description' => $request->description,
        ];
        $vacancy = Vacancy::create($data);
        return redirect()->route('vacancies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show',compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        $islands = [
            'Abaco'=>'Abaco',
            'Acklins'=>'Acklins',
            'Andros'=>'Andros',
            'Berry Islands'=>'Berry Islands',
            'Bimini'=>'Bimini',
            'Cat Island'=>'Cat Island',
            'Crooked Island'=>'Crooked Island',
            'Eleuthera'=>'Eleuthera',
            'Exuma'=>'Exuma',
            'Grand Bahama'=>'Grand Bahama',
            'Inagua'=>'Inagua',
            'Long Cay'=>'Long Cay',
            'Long Island'=>'Long Island',
            'Mayaguana'=>'Mayaguana',
            'New Providence'=>'New Providence',
            'Ragged Island'=>'Ragged Island',
            'Rum Cay'=>'Rum Cay',
            'San Salvador'=>'San Salvador'];
        $jobTypes =['1'=>'Full Time','2'=>'Part Time','3'=>'Remote'];
        return view('vacancies.edit',compact('vacancy','islands','jobTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVacancyRequest  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        $data = [
            'jobTitle' => $request->jobTitle,
            'island' => $request->island,
            'vacancy' => $request->vacancy,
            'jobType' => $request->jobType,
            'lastDate' => $request->lastDate,
            'description' => $request->description,
        ];

        $vacancy->update($data);
        return redirect()->route('vacancies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();

        return response()->json(['status'=>'success','message'=>'Job deleted successfully']);
    }
}