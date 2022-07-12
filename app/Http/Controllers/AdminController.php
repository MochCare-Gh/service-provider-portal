<?php
namespace App\Http\Controllers;

use App\User;
Use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Widgets;
use DB;
Class AdminController extends Controller
{

    public $widgets=['sum_count_avg'=>[],'group'=>[]];
    function __construct()
    {
        parent::__construct();
    }
    
    function DashBoard()
    {        
        $UsersCount=User::count();
        $widgets=$this->getWidgets();
        $UsersCountLasWeekPercentage=$UsersCount*(User::where('created_at','>=',  date('Y-m-d',strtotime(date('Y-m-d').'-1 month')) )->count())/100;
        return view('dashboard',array('UsersCount'=>$UsersCount,'UsersCountLasWeekPercentage'=>$UsersCountLasWeekPercentage,'widgets'=>$widgets));
    }

    public function getWidgets(){
        $allWidgets=Widgets::all();
        foreach($allWidgets as $widget){
            switch($widget->type){
                case 'average':
                    $widget->value=ceil(DB::table($widget->table)->avg($widget->tablefield));
                    array_push($this->widgets['sum_count_avg'],$widget);
                break;
                case 'count':
                    $widget->value=DB::table($widget->table)->count($widget->tablefield);
                    array_push($this->widgets['sum_count_avg'],$widget);
                break;
                case 'sum':
                    $widget->value=DB::table($widget->table)->sum($widget->tablefield);
                    array_push($this->widgets['sum_count_avg'],$widget);
                break;
                case 'group':
                    $widget->value=DB::table($widget->table)->select('id',$widget->tablefield,DB::raw('count(*) as total'),DB::raw('round(count('.$widget->tablefield.')/(select count(id) from '.$widget->table.')*100) as percentage'))->groupBy($widget->tablefield)->get();
                    array_push($this->widgets['group'],$widget);
                break;
            }
  
        }
        $this->widgets['colors']=array('dark','aero','green','blue','red','purple');
        //var_dump($this->widgets['sum_count_avg'][0]);die();
        return $this->widgets;
    }
    
    
    public function FileManage()
    {
        return view('filemanage');
    }
}

?>
