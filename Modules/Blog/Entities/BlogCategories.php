<?php
namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class BlogCategories extends Model
{
    protected $table = 'Blog_categories';
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
    
}
