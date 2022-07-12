<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Settings;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class SettingsController extends Controller
{
    
    public $Now;
    
    public function __construct(){
        parent::__construct();
        $this->Now=date('Y-m-d H:i:s');
        $this->Response=new ResponseController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('Settings');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Settings=Settings::query();
        
        return Datatables::of($Settings)->addColumn('actions', function ($Settings) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Settingsedit',$Settings->id).'" class="edit btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Settingsdelete',$Settings->id).'" class="delete btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $column;})->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request)
    {
        if($request['id'] !=''):
            $Settings = Settings::where('id',$request['id'])->first();    
            $Settings->registration=strip_tags($request["registration"]);$Settings->crudbuilder=strip_tags($request["crudbuilder"]);$Settings->filemanager=strip_tags($request["filemanager"]);
            $Settings->save();
        else:
            $Settings=new Settings();    
            $Settings->registration=strip_tags($request["registration"]);$Settings->crudbuilder=strip_tags($request["crudbuilder"]);$Settings->filemanager=strip_tags($request["filemanager"]);
            $Settings->save();
        endif;
        
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
            $data=Settings::where('id',$ID)->get();
            return $this->Response->prepareResult(200, $data, [],'');
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [],'');
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
       Settings::where('id',$ID)->delete();
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
}
