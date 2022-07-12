<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Region extends Model
{
    protected $table = 'Region';
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
    
    public function reg_personnel(){ return $this->belongsTo('App\Personnels', 'reg_personnel', 'id');}
    
}
