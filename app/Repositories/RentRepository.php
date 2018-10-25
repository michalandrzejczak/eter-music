<?php

namespace App\Repositories;

use App\Models\Rent;
use Carbon\Carbon;
/**
 *
 *
 * @package App\Repositories
 */
class RentRepository extends BaseRepository
{

    public function __construct(Rent $model) {
        $this->model = $model;

    }

    public function findDatesByInstrument($idInstrument) {
        $rents =  $this->model->with('instrument')->where('instrument_id','=',$idInstrument)->get();

        $firstDay = Carbon::now();

        $lastDay = Carbon::now()->addMonth();

        for($date = $firstDay; $date->lte($lastDay); $date->addDay()) {

            $dates[$date->format('Y-m-d')] = $date->format('Y-m-d');

            foreach($rents as $rent){
                $rentStartDate = Carbon::createFromFormat("Y-m-d H:i:s",$rent->start);

                $rentEndDate = Carbon::createFromFormat("Y-m-d H:i:s",$rent->end);

                if($rentStartDate->lte($date) && $rentEndDate->gte($date))
                {
                    $dates[$date->format('Y-m-d')] = array($date->format('Y-m-d'),$rent->toArray());

                }
            }
        }
        return $dates;
    }
    
    public function findRentsByUser($userName) {
        $rents =  $this->model->with('user')->where('user','=',$userName)->orderBy('start', 'asc')->get();
        return $rents;
    }

}