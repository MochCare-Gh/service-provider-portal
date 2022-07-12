<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Districts extends Model
{
    protected $table = 'Districts';
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
    
    public function dist_personnel(){ return $this->belongsTo('App\Personnels', 'dist_personnel', 'id');}public function dist_region(){ return $this->belongsTo('App\Region', 'dist_region', 'id');}
    
}
