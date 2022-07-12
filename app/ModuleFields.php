<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class ModuleFields extends Model
{

    protected $table = 'module_fields';
    
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
    
    public function Modules()
    {
        return $this->belongsTo('App\Modules', 'module_id', 'id');
    }
    
    public function getValidationRulesAttribute($value) {
        return json_decode($value);
    }
}
