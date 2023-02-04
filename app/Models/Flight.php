<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'requestDate',
        'leg',
        'flightNo',
        'origin',
        'deperture',
        'deptime',
        'arrtime',
        'ftime',
        'equipment',
        'change',
        'connect',
    ];




    /**
     * This function returns all the categories by default active
     * @param $request
     * @purpose admin
     * @return collection
     */
    public static function getFlight($request){

        $requestDate = $request->requestDate;
        $deptime = $request->deptime;
        $arrtime = $request->arrtime;
        $origin = $request->origin;
        $deperture = $request->deperture;
        $change = $request->change;
        $connect = $request->connect;


        if ($request->state == 'docready') {
            return self::all();
        }

       return self::select(
           'flights.id',
           'flights.requestDate',
           'flights.leg',
           'flights.flightNo',
           'flights.origin',
           'flights.deperture',
           'flights.deptime',
           'flights.arrtime',
           'flights.ftime',
           'flights.equipment',
           'flights.change',
           'flights.connect',
           )
           ->where('flights.requestDate',$requestDate)
        //    ->where('flights.deptime',$deptime)
        //    ->where('flights.arrtime',$arrtime)
           ->where('flights.origin',$origin)
           ->where('flights.deperture',$deperture)
        //    ->where('flights.change',$change)
        //    ->where('flights.connect',$connect)
           ->orderBy('id', 'DESC')
           ->get();
   }
}
