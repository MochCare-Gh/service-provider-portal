<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Healthfacility extends Model
{
    protected $table = 'Healthfacility';
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
    
    public function district(){ return $this->belongsTo('App\Districts', 'district', 'id');}public function facility_type(){ return $this->belongsTo('App\Facility', 'facility_type', 'id');}public function category(){ return $this->belongsTo('App\Category', 'category', 'id');}public function rep(){ return $this->belongsTo('App\Personnels', 'rep', 'id');}
    
}
