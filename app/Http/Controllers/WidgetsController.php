<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Widgets;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;
use App\Modules;
use DB;

class WidgetsController extends Controller
{
    
    public $Now;
    public $Response;
    private $dataBaseName;
    public function __construct(){
        parent::__construct();
        $this->Now=date('Y-m-d H:i:s');
        $this->Response=new ResponseController();
        $this->dataBaseName = DB::connection()->getDatabaseName();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ID)
    {
        try {
            $Module=Modules::where('id',$ID)->first();
            $Table=ucfirst($Module->module_name);
            $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM `'.$Table.'`'));
            return View('Widgets',['columns'=>  json_encode($table_info_columns),
                'module'=>$Module,'table'=>$Table,'module_id'=>$ID]);
        } catch (\Exception $exc) {
            
        }

    }
    
    /**
     * 
     * @return type 
     */
    public function All($module_id=NULL)
    {
        $Widgets=Widgets::where('module_id',$module_id);
        
        return Datatables::of($Widgets)->addColumn('Select', function($Widgets) { return '<input class="flat Widgets_record" name="Widgets_record"  type="checkbox" value="'.$Widgets->id.'" />';})
                ->addColumn('actions', function ($Widgets) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Widgetsedit',$Widgets->id).'" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Widgetsdelete',$Widgets->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request)
    {
        try {
            if($request['id'] !=''):
                $Widgets = Widgets::where('id',$request['id'])->first();    
                $Widgets->type=strip_tags($request["type"]);
                $Widgets->icon=strip_tags($request["icon"]);
                $Widgets->title=strip_tags($request["title"]);
                $Widgets->module_id=strip_tags($request["module_id"]);               
                $Widgets->table=strip_tags($request["table"]);
                $Widgets->tablefield=strip_tags($request["tablefield"]);
                $Widgets->save();
                return $this->Response->prepareResult(200,$Widgets,[],'Widgets Saved successfully ','ajax');
            else:
                $Widgets=new Widgets();    
                $Widgets->type=strip_tags($request["type"]);
                $Widgets->icon=strip_tags($request["icon"]);
                $Widgets->title=strip_tags($request["title"]);
                $Widgets->module_id=strip_tags($request["module_id"]);
                $Widgets->table=strip_tags($request["table"]);
                $Widgets->tablefield=strip_tags($request["tablefield"]);
                $Widgets->save();
                return $this->Response->prepareResult(200,$Widgets,[],'Widgets Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Widgets Could not be  Saved');
        }

        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function edit($ID)
    {
        try {
                $data=Widgets::where('id',$ID)->get();
                return $this->Response->prepareResult(200,$data,[],null,'ajax');
            } catch (\Exception $exc) {
                 return $this->Response->prepareResult(400,[],null,'ajax','Could not get This item');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function Delete($ID)
    {
        try {
                Widgets::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Widgets Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Widgets Item Could be not deleted');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function DeleteMultiple(Request $request)
    {
        try {
                Widgets::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Widgets Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Widgets Item/s Could be not deleted');
    }
    
    /**
     * Upload Attachment Or Image
     */
    protected function Upload(Request $request,$FieldName)
    {
        $path='';
        $Image = $request->file($FieldName);
        if($Image):
            $Extension = $Image->getClientOriginalExtension();
            $path = $Image->getFilename() . '.' . $Extension;
            Storage::disk('files_folder')->put($path, File::get($request->file($FieldName)));
        endif;
        return $path;
    }
    
    private function GetTableNames()
    {
        $FinalTables=array();
        $AllTables = DB::select('SHOW TABLES');
        foreach ($AllTables as $tableObject) {
            $DBkey = 'Tables_in_' . strtolower($this->dataBaseName);
            $Table = $tableObject->$DBkey;
            $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM `'.$Table.'`'));
            $FinalTables[$Table] = $table_info_columns;
        }
        return $FinalTables;
    }
}
