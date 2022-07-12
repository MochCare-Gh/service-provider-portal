<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Staff extends Model
{
    protected $table = 'Staff';
    /**
    * Prepare a date for array / JSON serialization.
    *
    * @param  \DateTimeInterface  $date
    * @return string
    */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    public function staff_designation(){ return $this->belongsTo('App\Stafftypes', 'staff_designation', 'id');}
    
}
