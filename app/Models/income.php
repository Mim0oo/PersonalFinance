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

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'ammount' => 'integer',
			'month' => 'integer',
			'paid' => 'integer',
			'year' => 'integer',
			'source_id'=> 'integer'
        ];
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