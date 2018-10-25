<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'instrument_id', 'start', 'end', 'price'
    ];

    public function instrument()
    {
        return $this->belongsTo('App\Models\Instrument');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
