<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Immunizations;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class ImmunizationsController extends Controller
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
        return View('Immunizations_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Immunizations=Immunizations::query();
        $Immunizations=$Immunizations->with('staff_id');
        return Datatables::of($Immunizations)->addColumn('Select', function($Immunizations) { return '<input class="flat Immunizations_record" name="Immunizations_record"  type="checkbox" value="'.$Immunizations->id.'" />';})
                ->addColumn('actions', function ($Immunizations) {
                $column='<a href="'.route('Immunizationsview',$Immunizations->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Immunizationsedit',$Immunizations->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Immunizationsdelete',$Immunizations->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'ch_reg_no' => 
  array (
    0 => 'string',
  ),
  'mo_reg_no' => 
  array (
  ),
  'age' => 
  array (
  ),
  'vaccine' => 
  array (
    0 => 'string',
  ),
  'batch_no' => 
  array (
  ),
  'place_given' => 
  array (
  ),
  'staff_id' => 
  array (
  ),
  'other_vaccine' => 
  array (
  ),
  'date' => 
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Immunizations Could not be  Saved');
            }
            if($request['id'] !=''):
                $Immunizations = Immunizations::where('id',$request['id'])->first();    
                $Immunizations->ch_reg_no=strip_tags($request["ch_reg_no"]);$Immunizations->mo_reg_no=strip_tags($request["mo_reg_no"]);$Immunizations->age=strip_tags($request["age"]);$Immunizations->vaccine=strip_tags($request["vaccine"]);$Immunizations->batch_no=strip_tags($request["batch_no"]);$Immunizations->place_given=strip_tags($request["place_given"]);$Immunizations->staff_id=$request["staff_id"];$Immunizations->other_vaccine=strip_tags($request["other_vaccine"]);$Immunizations->date=strip_tags($request["date"]);
                $Immunizations->save();
                return $this->Response->prepareResult(200,$Immunizations,[],'Immunizations Saved successfully ','ajax');
            else:
                $Immunizations=new Immunizations();    
                $Immunizations->ch_reg_no=strip_tags($request["ch_reg_no"]);$Immunizations->mo_reg_no=strip_tags($request["mo_reg_no"]);$Immunizations->age=strip_tags($request["age"]);$Immunizations->vaccine=strip_tags($request["vaccine"]);$Immunizations->batch_no=strip_tags($request["batch_no"]);$Immunizations->place_given=strip_tags($request["place_given"]);$Immunizations->staff_id=$request["staff_id"];$Immunizations->other_vaccine=strip_tags($request["other_vaccine"]);$Immunizations->date=strip_tags($request["date"]);
                $Immunizations->save();
                return $this->Response->prepareResult(200,$Immunizations,[],'Immunizations Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Immunizations Could not be  Saved');
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
                $data=Immunizations::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Immunizations_view');
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
                $data=Immunizations::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Immunizations_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Immunizations_add');
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
                Immunizations::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Immunizations Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Immunizations Item Could be not deleted');
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
                Immunizations::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Immunizations Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Immunizations Item/s Could be not deleted');
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
