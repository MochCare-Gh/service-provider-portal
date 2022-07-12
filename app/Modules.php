<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Modules extends Model
{

    protected $table = 'modules';
    
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

    public function ModuleFields()
    {
        return $this->hasMany('App\ModuleFields', 'module_id', 'id');
    }
}
