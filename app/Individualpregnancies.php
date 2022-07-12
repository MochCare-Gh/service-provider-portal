<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Individualpregnancies extends Model
{
    protected $table = 'Individualpregnancies';
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
    
    public function birth_mother_reg_no(){ return $this->belongsTo('App\Mothers', 'birth_mother_reg_no', 'id');}
    public function setBirthDateAttribute($value){ $this->attributes['birth_date'] = date('Y-m-d',  strtotime(strtolower($value))); }public function getBirth_DateAttribute($value){ return date('d-m-Y',  strtotime($value)); }
}
