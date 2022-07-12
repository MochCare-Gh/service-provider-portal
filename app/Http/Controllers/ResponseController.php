<?php
namespace App\Http\Controllers;

Use App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\MessageBag;
Class ResponseController extends Controller
{
    public function prepareResult($status,$data,$errors=[],$success_message=null,$ResponseType='ajax',$ViewNameOrRedirectRoute=null,$error_message=null){
        if(empty($errors)){$errors=new MessageBag();}
        if(Request::is('api*') || $ResponseType=='ajax'){
            return response()->json(['data'=>$data,'success_message'=>$success_message,'errors'=>$errors,'error_message'=>$error_message],$status);
        }
        switch ($ResponseType){
            case 'view':
                return view($ViewNameOrRedirectRoute,['data'=>$data,'success_message'=>$success_message,'error_message'=>$error_message]);
            break;
            case 'redirect':
                return redirect($ViewNameOrRedirectRoute)->withInput()->withErrors($errors)
                    ->with('data',$data)
                    ->with('success_message',$success_message)
                    ->with('error_message',$error_message);
            break;
        }        
    }
    
}
