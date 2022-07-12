<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Postnatalrecords;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class PostnatalrecordsController extends Controller
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
        return View('Postnatalrecords_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Postnatalrecords=Postnatalrecords::query();
        $Postnatalrecords=$Postnatalrecords->with('staff_id');$Postnatalrecords=$Postnatalrecords->with('mo_reg_no');
        return Datatables::of($Postnatalrecords)->addColumn('Select', function($Postnatalrecords) { return '<input class="flat Postnatalrecords_record" name="Postnatalrecords_record"  type="checkbox" value="'.$Postnatalrecords->id.'" />';})
                ->addColumn('actions', function ($Postnatalrecords) {
                $column='<a href="'.route('Postnatalrecordsview',$Postnatalrecords->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Postnatalrecordsedit',$Postnatalrecords->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Postnatalrecordsdelete',$Postnatalrecords->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'date' => 
  array (
    0 => 'date',
  ),
  'weight' => 
  array (
    0 => 'string',
  ),
  'bp' => 
  array (
  ),
  'urine' => 
  array (
  ),
  'pulse' => 
  array (
  ),
  'fundal_height' => 
  array (
    0 => 'string',
  ),
  'temperature' => 
  array (
  ),
  'lochia_colour' => 
  array (
  ),
  'breast_condition' => 
  array (
    0 => 'string',
  ),
  'ifa_supplied_days' => 
  array (
  ),
  'complaints' => 
  array (
  ),
  'staff_id' => 
  array (
  ),
  'incision_perineum' => 
  array (
  ),
  'mood_changes' => 
  array (
  ),
  'mo_reg_no' => 
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Postnatalrecords Could not be  Saved');
            }
            if($request['id'] !=''):
                $Postnatalrecords = Postnatalrecords::where('id',$request['id'])->first();    
                $Postnatalrecords->date=strip_tags($request["date"]);$Postnatalrecords->weight=strip_tags($request["weight"]);$Postnatalrecords->bp=strip_tags($request["bp"]);$Postnatalrecords->urine=strip_tags($request["urine"]);$Postnatalrecords->pulse=strip_tags($request["pulse"]);$Postnatalrecords->fundal_height=strip_tags($request["fundal_height"]);$Postnatalrecords->temperature=strip_tags($request["temperature"]);$Postnatalrecords->lochia_colour=strip_tags($request["lochia_colour"]);$Postnatalrecords->breast_condition=strip_tags($request["breast_condition"]);$Postnatalrecords->ifa_supplied_days=strip_tags($request["ifa_supplied_days"]);$Postnatalrecords->complaints=strip_tags($request["complaints"]);$Postnatalrecords->staff_id=$request["staff_id"];$Postnatalrecords->incision_perineum=strip_tags($request["incision_perineum"]);$Postnatalrecords->mood_changes=strip_tags($request["mood_changes"]);$Postnatalrecords->mo_reg_no=$request["mo_reg_no"];
                $Postnatalrecords->save();
                return $this->Response->prepareResult(200,$Postnatalrecords,[],'Postnatalrecords Saved successfully ','ajax');
            else:
                $Postnatalrecords=new Postnatalrecords();    
                $Postnatalrecords->date=strip_tags($request["date"]);$Postnatalrecords->weight=strip_tags($request["weight"]);$Postnatalrecords->bp=strip_tags($request["bp"]);$Postnatalrecords->urine=strip_tags($request["urine"]);$Postnatalrecords->pulse=strip_tags($request["pulse"]);$Postnatalrecords->fundal_height=strip_tags($request["fundal_height"]);$Postnatalrecords->temperature=strip_tags($request["temperature"]);$Postnatalrecords->lochia_colour=strip_tags($request["lochia_colour"]);$Postnatalrecords->breast_condition=strip_tags($request["breast_condition"]);$Postnatalrecords->ifa_supplied_days=strip_tags($request["ifa_supplied_days"]);$Postnatalrecords->complaints=strip_tags($request["complaints"]);$Postnatalrecords->staff_id=$request["staff_id"];$Postnatalrecords->incision_perineum=strip_tags($request["incision_perineum"]);$Postnatalrecords->mood_changes=strip_tags($request["mood_changes"]);$Postnatalrecords->mo_reg_no=$request["mo_reg_no"];
                $Postnatalrecords->save();
                return $this->Response->prepareResult(200,$Postnatalrecords,[],'Postnatalrecords Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Postnatalrecords Could not be  Saved');
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
                $data=Postnatalrecords::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Postnatalrecords_view');
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
                $data=Postnatalrecords::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Postnatalrecords_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Postnatalrecords_add');
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
                Postnatalrecords::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Postnatalrecords Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Postnatalrecords Item Could be not deleted');
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
                Postnatalrecords::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Postnatalrecords Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Postnatalrecords Item/s Could be not deleted');
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
