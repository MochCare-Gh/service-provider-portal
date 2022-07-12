<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Mothers extends Model
{
    protected $table = 'Mothers';
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
    
    public function mo_district(){ return $this->belongsTo('App\Districts', 'mo_district', 'id');}public function staff(){ return $this->belongsTo('App\Staff', 'staff', 'id');}
    public function setMoDobAttribute($value){ $this->attributes['mo_dob'] = date('Y-m-d',  strtotime(strtolower($value))); }public function getMo_DobAttribute($value){ return date('d-m-Y',  strtotime($value)); }public function setMoRegDateAttribute($value){ $this->attributes['mo_reg_date'] = date('Y-m-d',  strtotime(strtolower($value))); }public function getMo_Reg_DateAttribute($value){ return date('d-m-Y',  strtotime($value)); }
}
