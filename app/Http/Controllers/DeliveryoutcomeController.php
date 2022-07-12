<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Deliveryoutcome;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class DeliveryoutcomeController extends Controller
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
        return View('Deliveryoutcome_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Deliveryoutcome=Deliveryoutcome::query();
        $Deliveryoutcome=$Deliveryoutcome->with('place_of_delivery');$Deliveryoutcome=$Deliveryoutcome->with('mo_reg_no');
        return Datatables::of($Deliveryoutcome)->addColumn('Select', function($Deliveryoutcome) { return '<input class="flat Deliveryoutcome_record" name="Deliveryoutcome_record"  type="checkbox" value="'.$Deliveryoutcome->id.'" />';})
                ->addColumn('actions', function ($Deliveryoutcome) {
                $column='<a href="'.route('Deliveryoutcomeview',$Deliveryoutcome->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Deliveryoutcomeedit',$Deliveryoutcome->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Deliveryoutcomedelete',$Deliveryoutcome->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'date' => 
  array (
    0 => 'date',
  ),
  'pregnancy_weeks' => 
  array (
    0 => 'string',
  ),
  'delivery_time' => 
  array (
  ),
  'placenta_delivery' => 
  array (
  ),
  'labour_in_delivery_duration' => 
  array (
  ),
  'delivery_type' => 
  array (
  ),
  'vacuum_indication' => 
  array (
  ),
  'anesthesia' => 
  array (
  ),
  'est_blood_loss' => 
  array (
  ),
  'blood_transfusion' => 
  array (
  ),
  'placenta_state' => 
  array (
  ),
  'perineum_state' => 
  array (
  ),
  'delivery_complications' => 
  array (
  ),
  'birth_attendant' => 
  array (
  ),
  'place_of_delivery' => 
  array (
  ),
  'brestfeeding_30min' => 
  array (
  ),
  'infant_skin_to_skin' => 
  array (
  ),
  'mothers_condition' => 
  array (
  ),
  'bp' => 
  array (
  ),
  'pulse' => 
  array (
  ),
  'temperature' => 
  array (
  ),
  'uterus_condition' => 
  array (
  ),
  'incision_perineum' => 
  array (
  ),
  'breast_condition' => 
  array (
  ),
  'fundal_height' => 
  array (
  ),
  'lochia_colour' => 
  array (
  ),
  'lochia_odour' => 
  array (
  ),
  'ifa_supply_days' => 
  array (
  ),
  'pnc_type_1' => 
  array (
  ),
  'delivery_outcome' => 
  array (
  ),
  'number_of_babies' => 
  array (
  ),
  'baby_sex' => 
  array (
  ),
  'weight' => 
  array (
  ),
  'length' => 
  array (
  ),
  'circumference' => 
  array (
  ),
  'apgar_score' => 
  array (
  ),
  'resuscitation' => 
  array (
  ),
  'congenital_malformation' => 
  array (
  ),
  'complications' => 
  array (
  ),
  'diagnosis' => 
  array (
  ),
  'referred_to' => 
  array (
  ),
  'heart_rate' => 
  array (
  ),
  'respiratory_rate' => 
  array (
    0 => 'string',
  ),
  'brestfeeding' => 
  array (
  ),
  'baby_suckling' => 
  array (
  ),
  'meconium_passed' => 
  array (
  ),
  'urine_passed' => 
  array (
  ),
  'tetracycle_for_eyecare' => 
  array (
  ),
  'cord_care' => 
  array (
  ),
  'baby_condition_discharge' => 
  array (
  ),
  'mo_reg_no' => 
  array (
    0 => 'string',
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Deliveryoutcome Could not be  Saved');
            }
            if($request['id'] !=''):
                $Deliveryoutcome = Deliveryoutcome::where('id',$request['id'])->first();    
                $Deliveryoutcome->date=strip_tags($request["date"]);$Deliveryoutcome->pregnancy_weeks=strip_tags($request["pregnancy_weeks"]);$Deliveryoutcome->delivery_time=strip_tags($request["delivery_time"]);$Deliveryoutcome->placenta_delivery=strip_tags($request["placenta_delivery"]);$Deliveryoutcome->labour_in_delivery_duration=strip_tags($request["labour_in_delivery_duration"]);$Deliveryoutcome->delivery_type=strip_tags($request["delivery_type"]);$Deliveryoutcome->vacuum_indication=strip_tags($request["vacuum_indication"]);$Deliveryoutcome->anesthesia=strip_tags($request["anesthesia"]);$Deliveryoutcome->est_blood_loss=strip_tags($request["est_blood_loss"]);$Deliveryoutcome->blood_transfusion=strip_tags($request["blood_transfusion"]);$Deliveryoutcome->placenta_state=strip_tags($request["placenta_state"]);$Deliveryoutcome->perineum_state=strip_tags($request["perineum_state"]);$Deliveryoutcome->delivery_complications=strip_tags($request["delivery_complications"]);$Deliveryoutcome->birth_attendant=strip_tags($request["birth_attendant"]);$Deliveryoutcome->place_of_delivery=$request["place_of_delivery"];$Deliveryoutcome->brestfeeding_30min=strip_tags($request["brestfeeding_30min"]);$Deliveryoutcome->infant_skin_to_skin=strip_tags($request["infant_skin_to_skin"]);$Deliveryoutcome->mothers_condition=strip_tags($request["mothers_condition"]);$Deliveryoutcome->bp=strip_tags($request["bp"]);$Deliveryoutcome->pulse=strip_tags($request["pulse"]);$Deliveryoutcome->temperature=strip_tags($request["temperature"]);$Deliveryoutcome->uterus_condition=strip_tags($request["uterus_condition"]);$Deliveryoutcome->incision_perineum=strip_tags($request["incision_perineum"]);$Deliveryoutcome->breast_condition=strip_tags($request["breast_condition"]);$Deliveryoutcome->fundal_height=strip_tags($request["fundal_height"]);$Deliveryoutcome->lochia_colour=strip_tags($request["lochia_colour"]);$Deliveryoutcome->lochia_odour=strip_tags($request["lochia_odour"]);$Deliveryoutcome->ifa_supply_days=strip_tags($request["ifa_supply_days"]);$Deliveryoutcome->pnc_type_1=strip_tags($request["pnc_type_1"]);$Deliveryoutcome->delivery_outcome=strip_tags($request["delivery_outcome"]);$Deliveryoutcome->number_of_babies=strip_tags($request["number_of_babies"]);$Deliveryoutcome->baby_sex=strip_tags($request["baby_sex"]);$Deliveryoutcome->weight=strip_tags($request["weight"]);$Deliveryoutcome->length=strip_tags($request["length"]);$Deliveryoutcome->circumference=strip_tags($request["circumference"]);$Deliveryoutcome->apgar_score=strip_tags($request["apgar_score"]);$Deliveryoutcome->resuscitation=strip_tags($request["resuscitation"]);$Deliveryoutcome->congenital_malformation=strip_tags($request["congenital_malformation"]);$Deliveryoutcome->complications=strip_tags($request["complications"]);$Deliveryoutcome->diagnosis=strip_tags($request["diagnosis"]);$Deliveryoutcome->referred_to=strip_tags($request["referred_to"]);$Deliveryoutcome->heart_rate=strip_tags($request["heart_rate"]);$Deliveryoutcome->respiratory_rate=strip_tags($request["respiratory_rate"]);$Deliveryoutcome->brestfeeding=strip_tags($request["brestfeeding"]);$Deliveryoutcome->baby_suckling=strip_tags($request["baby_suckling"]);$Deliveryoutcome->meconium_passed=strip_tags($request["meconium_passed"]);$Deliveryoutcome->urine_passed=strip_tags($request["urine_passed"]);$Deliveryoutcome->tetracycle_for_eyecare=strip_tags($request["tetracycle_for_eyecare"]);$Deliveryoutcome->cord_care=strip_tags($request["cord_care"]);$Deliveryoutcome->baby_condition_discharge=strip_tags($request["baby_condition_discharge"]);$Deliveryoutcome->mo_reg_no=$request["mo_reg_no"];
                $Deliveryoutcome->save();
                return $this->Response->prepareResult(200,$Deliveryoutcome,[],'Deliveryoutcome Saved successfully ','ajax');
            else:
                $Deliveryoutcome=new Deliveryoutcome();    
                $Deliveryoutcome->date=strip_tags($request["date"]);$Deliveryoutcome->pregnancy_weeks=strip_tags($request["pregnancy_weeks"]);$Deliveryoutcome->delivery_time=strip_tags($request["delivery_time"]);$Deliveryoutcome->placenta_delivery=strip_tags($request["placenta_delivery"]);$Deliveryoutcome->labour_in_delivery_duration=strip_tags($request["labour_in_delivery_duration"]);$Deliveryoutcome->delivery_type=strip_tags($request["delivery_type"]);$Deliveryoutcome->vacuum_indication=strip_tags($request["vacuum_indication"]);$Deliveryoutcome->anesthesia=strip_tags($request["anesthesia"]);$Deliveryoutcome->est_blood_loss=strip_tags($request["est_blood_loss"]);$Deliveryoutcome->blood_transfusion=strip_tags($request["blood_transfusion"]);$Deliveryoutcome->placenta_state=strip_tags($request["placenta_state"]);$Deliveryoutcome->perineum_state=strip_tags($request["perineum_state"]);$Deliveryoutcome->delivery_complications=strip_tags($request["delivery_complications"]);$Deliveryoutcome->birth_attendant=strip_tags($request["birth_attendant"]);$Deliveryoutcome->place_of_delivery=$request["place_of_delivery"];$Deliveryoutcome->brestfeeding_30min=strip_tags($request["brestfeeding_30min"]);$Deliveryoutcome->infant_skin_to_skin=strip_tags($request["infant_skin_to_skin"]);$Deliveryoutcome->mothers_condition=strip_tags($request["mothers_condition"]);$Deliveryoutcome->bp=strip_tags($request["bp"]);$Deliveryoutcome->pulse=strip_tags($request["pulse"]);$Deliveryoutcome->temperature=strip_tags($request["temperature"]);$Deliveryoutcome->uterus_condition=strip_tags($request["uterus_condition"]);$Deliveryoutcome->incision_perineum=strip_tags($request["incision_perineum"]);$Deliveryoutcome->breast_condition=strip_tags($request["breast_condition"]);$Deliveryoutcome->fundal_height=strip_tags($request["fundal_height"]);$Deliveryoutcome->lochia_colour=strip_tags($request["lochia_colour"]);$Deliveryoutcome->lochia_odour=strip_tags($request["lochia_odour"]);$Deliveryoutcome->ifa_supply_days=strip_tags($request["ifa_supply_days"]);$Deliveryoutcome->pnc_type_1=strip_tags($request["pnc_type_1"]);$Deliveryoutcome->delivery_outcome=strip_tags($request["delivery_outcome"]);$Deliveryoutcome->number_of_babies=strip_tags($request["number_of_babies"]);$Deliveryoutcome->baby_sex=strip_tags($request["baby_sex"]);$Deliveryoutcome->weight=strip_tags($request["weight"]);$Deliveryoutcome->length=strip_tags($request["length"]);$Deliveryoutcome->circumference=strip_tags($request["circumference"]);$Deliveryoutcome->apgar_score=strip_tags($request["apgar_score"]);$Deliveryoutcome->resuscitation=strip_tags($request["resuscitation"]);$Deliveryoutcome->congenital_malformation=strip_tags($request["congenital_malformation"]);$Deliveryoutcome->complications=strip_tags($request["complications"]);$Deliveryoutcome->diagnosis=strip_tags($request["diagnosis"]);$Deliveryoutcome->referred_to=strip_tags($request["referred_to"]);$Deliveryoutcome->heart_rate=strip_tags($request["heart_rate"]);$Deliveryoutcome->respiratory_rate=strip_tags($request["respiratory_rate"]);$Deliveryoutcome->brestfeeding=strip_tags($request["brestfeeding"]);$Deliveryoutcome->baby_suckling=strip_tags($request["baby_suckling"]);$Deliveryoutcome->meconium_passed=strip_tags($request["meconium_passed"]);$Deliveryoutcome->urine_passed=strip_tags($request["urine_passed"]);$Deliveryoutcome->tetracycle_for_eyecare=strip_tags($request["tetracycle_for_eyecare"]);$Deliveryoutcome->cord_care=strip_tags($request["cord_care"]);$Deliveryoutcome->baby_condition_discharge=strip_tags($request["baby_condition_discharge"]);$Deliveryoutcome->mo_reg_no=$request["mo_reg_no"];
                $Deliveryoutcome->save();
                return $this->Response->prepareResult(200,$Deliveryoutcome,[],'Deliveryoutcome Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Deliveryoutcome Could not be  Saved');
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
                $data=Deliveryoutcome::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Deliveryoutcome_view');
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
                $data=Deliveryoutcome::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Deliveryoutcome_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Deliveryoutcome_add');
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
                Deliveryoutcome::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Deliveryoutcome Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Deliveryoutcome Item Could be not deleted');
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
                Deliveryoutcome::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Deliveryoutcome Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Deliveryoutcome Item/s Could be not deleted');
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
