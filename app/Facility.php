<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Facility extends Model
{
    protected $table = 'Facility';
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
    
    
    
}
