<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Menus extends Model
{

    protected $table = 'menus';
    
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
    
    public  function Children(){
        return $this->hasMany('App\Menus','parent')->orderBy('hierarchy','asc');
    }

}
