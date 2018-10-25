<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\RentRepository;
use App\Repositories\InstrumentRepository;
use App\Requests\CreateRentRequest;

class RentController extends Controller
{
        
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function show(RentRepository $rent, InstrumentRepository $instrument, $id = 1)
    {
        $dates = $rent->findDatesByInstrument($id);
        
        $instrument = $instrument->find($id);

        return view('rents', ['dates' => $dates, 'instrument_id' => $id, 'instrument'=> $instrument]);
    }

    public function create(RentRepository $rent, CreateRentRequest $request)
    {
        $arrayData = $request->filter();
        
        if ($arrayData)
            $rent->create($arrayData); 

        return redirect()->route('rents', ['id' => $request->input('instrument_id')]);
    }
}
