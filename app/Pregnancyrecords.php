<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Pregnancyrecords extends Model
{
    protected $table = 'Pregnancyrecords';
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
    
    public function rec_mo_reg_no(){ return $this->belongsTo('App\Mothers', 'rec_mo_reg_no', 'id');}
    
}
