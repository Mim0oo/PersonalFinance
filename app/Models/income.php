<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class income extends Model
{
    
    protected $table = 'income';

    protected $fillables = ['source_id,comment,ammount,paid,month,year'];

    public function sources()
    {
    	return $this->hasMany(source::class,'id','source_id');
    }
/*
   	public function getCommentAttribute()
   	{
   		return $this->comment;
   	}

   	public function getMonthAttribute()
   	{
   		return $this->month;
   	}

   	public function getYearAttribute()
   	{
   		return $this->year;
   	}
   	*/
}