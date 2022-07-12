<?php

namespace App\Helpers;


/**
 * To use custom methods
 * in front-end 
 *
 * @author ramy
 */
class Ch {
    
    /**
     * Check if passed route is 
     * the active route
     * @param type $routeName
     * @return boolean active
     */
    public static function isActive($routeName) {
        if(is_array($routeName)){
            return in_array(\Request::route()->getName(), $routeName);
        }
        return (\Request::route()->getName()==$routeName);
    }
}
