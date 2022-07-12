<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Childgrowth extends Model
{
    protected $table = 'Childgrowth';
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
    
    public function staff_id(){ return $this->belongsTo('App\Staff', 'staff_id', 'id');}public function mo_reg_no(){ return $this->belongsTo('App\Mothers', 'mo_reg_no', 'id');}
    public function setDateAttribute($value){ $this->attributes['date'] = date('Y-m-d',  strtotime(strtolower($value))); }public function getDateAttribute($value){ return date('d-m-Y',  strtotime($value)); }
}
