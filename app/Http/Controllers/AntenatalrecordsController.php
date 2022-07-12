<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Antenatalrecords;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class AntenatalrecordsController extends Controller
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
        return View('Antenatalrecords_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Antenatalrecords=Antenatalrecords::query();
        $Antenatalrecords=$Antenatalrecords->with('staff');$Antenatalrecords=$Antenatalrecords->with('mo_reg_no');
        return Datatables::of($Antenatalrecords)->addColumn('Select', function($Antenatalrecords) { return '<input class="flat Antenatalrecords_record" name="Antenatalrecords_record"  type="checkbox" value="'.$Antenatalrecords->id.'" />';})
                ->addColumn('actions', function ($Antenatalrecords) {
                $column='<a href="'.route('Antenatalrecordsview',$Antenatalrecords->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Antenatalrecordsedit',$Antenatalrecords->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Antenatalrecordsdelete',$Antenatalrecords->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
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
  'gest_age' => 
  array (
  ),
  'fundal_heights' => 
  array (
  ),
  'presentation' => 
  array (
  ),
  'descent' => 
  array (
  ),
  'fetal_heart_rate' => 
  array (
  ),
  'ifa_supply_days' => 
  array (
  ),
  'complaints' => 
  array (
  ),
  'staff' => 
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Antenatalrecords Could not be  Saved');
            }
            if($request['id'] !=''):
                $Antenatalrecords = Antenatalrecords::where('id',$request['id'])->first();    
                $Antenatalrecords->date=strip_tags($request["date"]);$Antenatalrecords->weight=strip_tags($request["weight"]);$Antenatalrecords->bp=strip_tags($request["bp"]);$Antenatalrecords->urine=strip_tags($request["urine"]);$Antenatalrecords->gest_age=strip_tags($request["gest_age"]);$Antenatalrecords->fundal_heights=strip_tags($request["fundal_heights"]);$Antenatalrecords->presentation=strip_tags($request["presentation"]);$Antenatalrecords->descent=strip_tags($request["descent"]);$Antenatalrecords->fetal_heart_rate=strip_tags($request["fetal_heart_rate"]);$Antenatalrecords->ifa_supply_days=strip_tags($request["ifa_supply_days"]);$Antenatalrecords->complaints=strip_tags($request["complaints"]);$Antenatalrecords->staff=$request["staff"];$Antenatalrecords->mo_reg_no=$request["mo_reg_no"];
                $Antenatalrecords->save();
                return $this->Response->prepareResult(200,$Antenatalrecords,[],'Antenatalrecords Saved successfully ','ajax');
            else:
                $Antenatalrecords=new Antenatalrecords();    
                $Antenatalrecords->date=strip_tags($request["date"]);$Antenatalrecords->weight=strip_tags($request["weight"]);$Antenatalrecords->bp=strip_tags($request["bp"]);$Antenatalrecords->urine=strip_tags($request["urine"]);$Antenatalrecords->gest_age=strip_tags($request["gest_age"]);$Antenatalrecords->fundal_heights=strip_tags($request["fundal_heights"]);$Antenatalrecords->presentation=strip_tags($request["presentation"]);$Antenatalrecords->descent=strip_tags($request["descent"]);$Antenatalrecords->fetal_heart_rate=strip_tags($request["fetal_heart_rate"]);$Antenatalrecords->ifa_supply_days=strip_tags($request["ifa_supply_days"]);$Antenatalrecords->complaints=strip_tags($request["complaints"]);$Antenatalrecords->staff=$request["staff"];$Antenatalrecords->mo_reg_no=$request["mo_reg_no"];
                $Antenatalrecords->save();
                return $this->Response->prepareResult(200,$Antenatalrecords,[],'Antenatalrecords Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Antenatalrecords Could not be  Saved');
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
                $data=Antenatalrecords::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Antenatalrecords_view');
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
                $data=Antenatalrecords::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Antenatalrecords_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Antenatalrecords_add');
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
                Antenatalrecords::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Antenatalrecords Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Antenatalrecords Item Could be not deleted');
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
                Antenatalrecords::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Antenatalrecords Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Antenatalrecords Item/s Could be not deleted');
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
