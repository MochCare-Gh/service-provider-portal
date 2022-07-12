<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use View;
use App\Menus;
use App\Settings;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct()
    {
        if (Auth::user()):
            $UserPermissionsNames=[];
            $UserRoles = Auth::user()->roles;
            foreach ($UserRoles as $role) {
                foreach ($role->perms as $permission):$UserPermissionsNames[] = $permission->name;
                endforeach;
            }
            //Get Menu Items
            $AllMenuItems = Menus::orderBy('parent','asc')->whereIn('permission_name',$UserPermissionsNames)
                    ->orWhere('type','menuItem')->orderBy('hierarchy','asc')->get();
            $AllMenuItemsArray=  $this->GetParentChildrenMenu($AllMenuItems);
            View::share('all_menu_items', $AllMenuItemsArray);
            View::share('user_permissions_names', $UserPermissionsNames);
        endif;
    }
    
    protected function GetParentChildrenMenu($AllMenuItems)
    {
        $FinalMenuItems=array();
        foreach($AllMenuItems as $MenuItem)
        {
            if($MenuItem->parent==0):
            $FinalMenuItems[$MenuItem->id]=$MenuItem->toArray();
            $FinalMenuItems[$MenuItem->id]['children']=array();
            else:
            $FinalMenuItems[$MenuItem->parent]['children'][]=$MenuItem->toArray();    
            endif;
        }
        return $FinalMenuItems;
    }
}
