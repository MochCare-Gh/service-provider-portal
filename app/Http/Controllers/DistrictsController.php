<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Districts;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class DistrictsController extends Controller
{
    
    public $Now;
    public $Response;
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
        return View('Districts_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Districts=Districts::query();
        $Districts=$Districts->with('dist_personnel');$Districts=$Districts->with('dist_region');
        return Datatables::of($Districts)->addColumn('Select', function($Districts) { return '<input class="flat Districts_record" name="Districts_record"  type="checkbox" value="'.$Districts->id.'" />';})
                ->addColumn('actions', function ($Districts) {
                $column='<a href="'.route('Districtsview',$Districts->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Districtsedit',$Districts->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Districtsdelete',$Districts->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'dist_name' => 
  array (
    0 => 'string',
  ),
  'dist_code' => 
  array (
  ),
  'dist_personnel' => 
  array (
  ),
  'dist_region' => 
  array (
    0 => 'integer',
  ),
));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request)
    {
        try {
            $validationResult = $this->validateCreateOrUpdate($request);
            if($validationResult->fails()){
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Districts Could not be  Saved');
            }
            if($request['id'] !=''):
                $Districts = Districts::where('id',$request['id'])->first();    
                $Districts->dist_name=strip_tags($request["dist_name"]);$Districts->dist_code=strip_tags($request["dist_code"]);$Districts->dist_personnel=$request["dist_personnel"];$Districts->dist_region=$request["dist_region"];
                $Districts->save();
                return $this->Response->prepareResult(200,$Districts,[],'Districts Saved successfully ','ajax');
            else:
                $Districts=new Districts();    
                $Districts->dist_name=strip_tags($request["dist_name"]);$Districts->dist_code=strip_tags($request["dist_code"]);$Districts->dist_personnel=$request["dist_personnel"];$Districts->dist_region=$request["dist_region"];
                $Districts->save();
                return $this->Response->prepareResult(200,$Districts,[],'Districts Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Districts Could not be  Saved');
        }

        
        
    }

    /**
     * Show the viw the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function view($ID)
    {
        try {
                $data=Districts::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Districts_view');
            } catch (\Exception $exc) {
                 return $this->Response->prepareResult(400,[],null,'view','Could not get This item');
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
                $data=Districts::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Districts_edit');
            } catch (\Exception $exc) {
                 return $this->Response->prepareResult(400,[],null,'view','Could not get This item');
        }
    }
    
    /**
     * Show the form for add the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        try {
                $data=new \stdClass();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Districts_add');
            } catch (\Exception $exc) {
                 return $this->Response->prepareResult(400,[],null,'view','Could not get This item');
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
                Districts::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Districts Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Districts Item Could be not deleted');
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
                Districts::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Districts Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Districts Item/s Could be not deleted');
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
