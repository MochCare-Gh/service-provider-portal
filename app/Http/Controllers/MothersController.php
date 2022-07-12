<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mothers;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class MothersController extends Controller
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
        return View('Mothers_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Mothers=Mothers::query();
        $Mothers=$Mothers->with('mo_district');$Mothers=$Mothers->with('staff');
        return Datatables::of($Mothers)->addColumn('Select', function($Mothers) { return '<input class="flat Mothers_record" name="Mothers_record"  type="checkbox" value="'.$Mothers->id.'" />';})
                ->addColumn('actions', function ($Mothers) {
                $column='<a href="'.route('Mothersview',$Mothers->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Mothersedit',$Mothers->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Mothersdelete',$Mothers->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'mo_serial_no' => 
  array (
    0 => 'string',
  ),
  'mo_reg_no' => 
  array (
  ),
  'mo_nhis_no' => 
  array (
  ),
  'mo_fullname' => 
  array (
  ),
  'mo_dob' => 
  array (
    0 => 'date',
  ),
  'mo_age' => 
  array (
  ),
  'mo_address' => 
  array (
  ),
  'mo_district' => 
  array (
  ),
  'mo_landmark' => 
  array (
  ),
  'mo_marital_status' => 
  array (
    0 => 'string',
  ),
  'mo_contact_1' => 
  array (
  ),
  'mo_contact_2' => 
  array (
  ),
  'mo_education_status' => 
  array (
  ),
  'mo_occupation' => 
  array (
  ),
  'mo_profession' => 
  array (
  ),
  'mo_spouse_name' => 
  array (
  ),
  'mo_spouse_contact' => 
  array (
  ),
  'mo_spouse_address' => 
  array (
  ),
  'mo_spouse_occupation' => 
  array (
  ),
  'mo_emergency_person' => 
  array (
  ),
  'mo_emergency_contact' => 
  array (
  ),
  'staff' => 
  array (
  ),
  'mo_reg_date' => 
  array (
    0 => 'date',
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Mothers Could not be  Saved');
            }
            if($request['id'] !=''):
                $Mothers = Mothers::where('id',$request['id'])->first();    
                $Mothers->mo_serial_no=strip_tags($request["mo_serial_no"]);$Mothers->mo_reg_no=strip_tags($request["mo_reg_no"]);$Mothers->mo_nhis_no=strip_tags($request["mo_nhis_no"]);$Mothers->mo_fullname=strip_tags($request["mo_fullname"]);$Mothers->mo_dob=strip_tags($request["mo_dob"]);$Mothers->mo_age=strip_tags($request["mo_age"]);$Mothers->mo_address=strip_tags($request["mo_address"]);$Mothers->mo_district=$request["mo_district"];$Mothers->mo_landmark=strip_tags($request["mo_landmark"]);$Mothers->mo_marital_status=strip_tags($request["mo_marital_status"]);$Mothers->mo_contact_1=strip_tags($request["mo_contact_1"]);$Mothers->mo_contact_2=strip_tags($request["mo_contact_2"]);$Mothers->mo_education_status=strip_tags($request["mo_education_status"]);$Mothers->mo_occupation=strip_tags($request["mo_occupation"]);$Mothers->mo_profession=strip_tags($request["mo_profession"]);$Mothers->mo_spouse_name=strip_tags($request["mo_spouse_name"]);$Mothers->mo_spouse_contact=strip_tags($request["mo_spouse_contact"]);$Mothers->mo_spouse_address=strip_tags($request["mo_spouse_address"]);$Mothers->mo_spouse_occupation=strip_tags($request["mo_spouse_occupation"]);$Mothers->mo_emergency_person=strip_tags($request["mo_emergency_person"]);$Mothers->mo_emergency_contact=strip_tags($request["mo_emergency_contact"]);$Mothers->staff=$request["staff"];$Mothers->mo_reg_date=strip_tags($request["mo_reg_date"]);
                $Mothers->save();
                return $this->Response->prepareResult(200,$Mothers,[],'Mothers Saved successfully ','ajax');
            else:
                $Mothers=new Mothers();    
                $Mothers->mo_serial_no=strip_tags($request["mo_serial_no"]);$Mothers->mo_reg_no=strip_tags($request["mo_reg_no"]);$Mothers->mo_nhis_no=strip_tags($request["mo_nhis_no"]);$Mothers->mo_fullname=strip_tags($request["mo_fullname"]);$Mothers->mo_dob=strip_tags($request["mo_dob"]);$Mothers->mo_age=strip_tags($request["mo_age"]);$Mothers->mo_address=strip_tags($request["mo_address"]);$Mothers->mo_district=$request["mo_district"];$Mothers->mo_landmark=strip_tags($request["mo_landmark"]);$Mothers->mo_marital_status=strip_tags($request["mo_marital_status"]);$Mothers->mo_contact_1=strip_tags($request["mo_contact_1"]);$Mothers->mo_contact_2=strip_tags($request["mo_contact_2"]);$Mothers->mo_education_status=strip_tags($request["mo_education_status"]);$Mothers->mo_occupation=strip_tags($request["mo_occupation"]);$Mothers->mo_profession=strip_tags($request["mo_profession"]);$Mothers->mo_spouse_name=strip_tags($request["mo_spouse_name"]);$Mothers->mo_spouse_contact=strip_tags($request["mo_spouse_contact"]);$Mothers->mo_spouse_address=strip_tags($request["mo_spouse_address"]);$Mothers->mo_spouse_occupation=strip_tags($request["mo_spouse_occupation"]);$Mothers->mo_emergency_person=strip_tags($request["mo_emergency_person"]);$Mothers->mo_emergency_contact=strip_tags($request["mo_emergency_contact"]);$Mothers->staff=$request["staff"];$Mothers->mo_reg_date=strip_tags($request["mo_reg_date"]);
                $Mothers->save();
                return $this->Response->prepareResult(200,$Mothers,[],'Mothers Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Mothers Could not be  Saved');
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
                $data=Mothers::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Mothers_view');
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
                $data=Mothers::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Mothers_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Mothers_add');
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
                Mothers::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Mothers Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Mothers Item Could be not deleted');
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
                Mothers::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Mothers Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Mothers Item/s Could be not deleted');
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
