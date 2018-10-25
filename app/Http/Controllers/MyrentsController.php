<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InstrumentRepository;
use App\Repositories\RentRepository;

class MyrentsController extends Controller
{
    public function index(InstrumentRepository $instrument, RentRepository $rent, $userName)
    {
        $instruments = $instrument->getAll();
        $rents = $rent->findRentsByUser($userName);

        return view('myrents', ['instruments'=>$instruments, 'rents'=>$rents]);
    }
}


