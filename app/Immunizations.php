<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Immunizations extends Model
{
    protected $table = 'Immunizations';
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
    
    public function staff_id(){ return $this->belongsTo('App\Staff', 'staff_id', 'id');}
    public function setDateAttribute($value){ $this->attributes['date'] = date('Y-m-d',  strtotime(strtolower($value))); }public function getDateAttribute($value){ return date('d-m-Y',  strtotime($value)); }
}
