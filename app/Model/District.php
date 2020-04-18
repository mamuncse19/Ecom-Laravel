<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
   	protected $fillable = [
   		'name','division_id'
   	];

   	public function division()
   	{
   		return $this->belongsTo(Division::class);
   	}
}
