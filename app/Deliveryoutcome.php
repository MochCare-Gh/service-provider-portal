<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Deliveryoutcome extends Model
{
    protected $table = 'Deliveryoutcome';
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
    
    public function place_of_delivery(){ return $this->belongsTo('App\Facility', 'place_of_delivery', 'id');}public function mo_reg_no(){ return $this->belongsTo('App\Mothers', 'mo_reg_no', 'id');}
    public function setDateAttribute($value){ $this->attributes['date'] = date('Y-m-d',  strtotime(strtolower($value))); }public function getDateAttribute($value){ return date('d-m-Y',  strtotime($value)); }
}
