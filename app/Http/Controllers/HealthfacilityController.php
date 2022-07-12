<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Healthfacility;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class HealthfacilityController extends Controller
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
        return View('Healthfacility_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Healthfacility=Healthfacility::query();
        $Healthfacility=$Healthfacility->with('district');$Healthfacility=$Healthfacility->with('facility_type');$Healthfacility=$Healthfacility->with('category');$Healthfacility=$Healthfacility->with('rep');
        return Datatables::of($Healthfacility)->addColumn('Select', function($Healthfacility) { return '<input class="flat Healthfacility_record" name="Healthfacility_record"  type="checkbox" value="'.$Healthfacility->id.'" />';})
                ->addColumn('actions', function ($Healthfacility) {
                $column='<a href="'.route('Healthfacilityview',$Healthfacility->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Healthfacilityedit',$Healthfacility->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Healthfacilitydelete',$Healthfacility->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'name' => 
  array (
    0 => 'string',
  ),
  'location' => 
  array (
  ),
  'district' => 
  array (
    0 => 'string',
  ),
  'facility_type' => 
  array (
  ),
  'category' => 
  array (
  ),
  'rep' => 
  array (
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Healthfacility Could not be  Saved');
            }
            if($request['id'] !=''):
                $Healthfacility = Healthfacility::where('id',$request['id'])->first();    
                $Healthfacility->name=strip_tags($request["name"]);$Healthfacility->location=strip_tags($request["location"]);$Healthfacility->district=$request["district"];$Healthfacility->facility_type=$request["facility_type"];$Healthfacility->category=$request["category"];$Healthfacility->rep=$request["rep"];
                $Healthfacility->save();
                return $this->Response->prepareResult(200,$Healthfacility,[],'Healthfacility Saved successfully ','ajax');
            else:
                $Healthfacility=new Healthfacility();    
                $Healthfacility->name=strip_tags($request["name"]);$Healthfacility->location=strip_tags($request["location"]);$Healthfacility->district=$request["district"];$Healthfacility->facility_type=$request["facility_type"];$Healthfacility->category=$request["category"];$Healthfacility->rep=$request["rep"];
                $Healthfacility->save();
                return $this->Response->prepareResult(200,$Healthfacility,[],'Healthfacility Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Healthfacility Could not be  Saved');
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
                $data=Healthfacility::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Healthfacility_view');
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
                $data=Healthfacility::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Healthfacility_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Healthfacility_add');
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
                Healthfacility::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Healthfacility Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Healthfacility Item Could be not deleted');
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
                Healthfacility::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Healthfacility Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Healthfacility Item/s Could be not deleted');
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
