<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Http\Requests\StoreFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Flight::query())->make(true);
        }
        return view('flights.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFlightRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlightRequest $request)
    {
        $data = [
            'requestDate' => $request->requestDate,
            'leg' => $request->leg,
            'flightNo' => $request->flightNo,
            'origin' => $request->origin,
            'deperture' => $request->deperture,
            'deptime' => $request->deptime,
            'arrtime' => $request->arrtime,
            'ftime' => $request->ftime,
            'equipment' => $request->equipment,
            'change' => $request->change,
            'connect' => $request->connect,
        ];

        $vacancy = Flight::create($data);
        return redirect()->route('flights.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $flight = Flight::find($request->id);
        return view('flights.edit',compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFlightRequest  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFlightRequest $request,Flight $flight)
    {

        // return $request;


        // $flight = Flight::find($request->id);
        // return $flight;


        $flight->requestDate = $request->requestDate;
        $flight->leg = $request->leg;
        $flight->flightNo = $request->flightNo;
        $flight->origin = $request->origin;
        $flight->deperture = $request->deperture;
        $flight->deptime = $request->deptime;
        $flight->arrtime = $request->arrtime;
        $flight->ftime = $request->ftime;
        $flight->equipment = $request->equipment;
        $flight->change = "Y";
        $flight->connect = $request->connect;
        $flight->save();


        return redirect()->route('flights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $flight = Flight::find($request->id);

        $delete = $flight->delete();
        if ($delete) {
            return response()->json(['status' => 'success', 'message' => 'Media deleted successfully']);
            # code...
        }
        return response()->json(['status' => 'error', 'message' => 'Media Could not delete']);
    }
}
