<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'title', 'description', 'image', 'user_id',
	];
	public function user()
	{
        return $this->belongsTo('App\Models\User');
	}
}
