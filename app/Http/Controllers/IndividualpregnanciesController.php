<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Individualpregnancies;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class IndividualpregnanciesController extends Controller
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
        return View('Individualpregnancies_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Individualpregnancies=Individualpregnancies::query();
        $Individualpregnancies=$Individualpregnancies->with('birth_mother_reg_no');
        return Datatables::of($Individualpregnancies)->addColumn('Select', function($Individualpregnancies) { return '<input class="flat Individualpregnancies_record" name="Individualpregnancies_record"  type="checkbox" value="'.$Individualpregnancies->id.'" />';})
                ->addColumn('actions', function ($Individualpregnancies) {
                $column='<a href="'.route('Individualpregnanciesview',$Individualpregnancies->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Individualpregnanciesedit',$Individualpregnancies->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Individualpregnanciesdelete',$Individualpregnancies->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'birth_no' => 
  array (
    0 => 'string',
  ),
  'birth_date' => 
  array (
    0 => 'date',
  ),
  'place_of_birth' => 
  array (
    0 => 'string',
  ),
  'mode_of_delivery' => 
  array (
  ),
  'outcome_of_delivery' => 
  array (
  ),
  'sex' => 
  array (
  ),
  'child_present_condition' => 
  array (
  ),
  'major_risk_factors' => 
  array (
  ),
  'pregnancy_problems' => 
  array (
  ),
  'gestational_age' => 
  array (
  ),
  'birth_weight' => 
  array (
    0 => 'integer',
  ),
  'labour_complications' => 
  array (
    0 => 'string',
  ),
  'birth_mother_reg_no' => 
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Individualpregnancies Could not be  Saved');
            }
            if($request['id'] !=''):
                $Individualpregnancies = Individualpregnancies::where('id',$request['id'])->first();    
                $Individualpregnancies->birth_no=strip_tags($request["birth_no"]);$Individualpregnancies->birth_date=strip_tags($request["birth_date"]);$Individualpregnancies->place_of_birth=strip_tags($request["place_of_birth"]);$Individualpregnancies->mode_of_delivery=strip_tags($request["mode_of_delivery"]);$Individualpregnancies->outcome_of_delivery=strip_tags($request["outcome_of_delivery"]);$Individualpregnancies->sex=strip_tags($request["sex"]);$Individualpregnancies->child_present_condition=strip_tags($request["child_present_condition"]);$Individualpregnancies->major_risk_factors=strip_tags($request["major_risk_factors"]);$Individualpregnancies->pregnancy_problems=strip_tags($request["pregnancy_problems"]);$Individualpregnancies->gestational_age=strip_tags($request["gestational_age"]);$Individualpregnancies->birth_weight=strip_tags($request["birth_weight"]);$Individualpregnancies->labour_complications=strip_tags($request["labour_complications"]);$Individualpregnancies->birth_mother_reg_no=$request["birth_mother_reg_no"];
                $Individualpregnancies->save();
                return $this->Response->prepareResult(200,$Individualpregnancies,[],'Individualpregnancies Saved successfully ','ajax');
            else:
                $Individualpregnancies=new Individualpregnancies();    
                $Individualpregnancies->birth_no=strip_tags($request["birth_no"]);$Individualpregnancies->birth_date=strip_tags($request["birth_date"]);$Individualpregnancies->place_of_birth=strip_tags($request["place_of_birth"]);$Individualpregnancies->mode_of_delivery=strip_tags($request["mode_of_delivery"]);$Individualpregnancies->outcome_of_delivery=strip_tags($request["outcome_of_delivery"]);$Individualpregnancies->sex=strip_tags($request["sex"]);$Individualpregnancies->child_present_condition=strip_tags($request["child_present_condition"]);$Individualpregnancies->major_risk_factors=strip_tags($request["major_risk_factors"]);$Individualpregnancies->pregnancy_problems=strip_tags($request["pregnancy_problems"]);$Individualpregnancies->gestational_age=strip_tags($request["gestational_age"]);$Individualpregnancies->birth_weight=strip_tags($request["birth_weight"]);$Individualpregnancies->labour_complications=strip_tags($request["labour_complications"]);$Individualpregnancies->birth_mother_reg_no=$request["birth_mother_reg_no"];
                $Individualpregnancies->save();
                return $this->Response->prepareResult(200,$Individualpregnancies,[],'Individualpregnancies Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Individualpregnancies Could not be  Saved');
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
                $data=Individualpregnancies::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Individualpregnancies_view');
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
                $data=Individualpregnancies::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Individualpregnancies_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Individualpregnancies_add');
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
                Individualpregnancies::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Individualpregnancies Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Individualpregnancies Item Could be not deleted');
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
                Individualpregnancies::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Individualpregnancies Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Individualpregnancies Item/s Could be not deleted');
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
