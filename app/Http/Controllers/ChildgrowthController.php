<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Childgrowth;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class ChildgrowthController extends Controller
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
        return View('Childgrowth_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Childgrowth=Childgrowth::query();
        $Childgrowth=$Childgrowth->with('staff_id');$Childgrowth=$Childgrowth->with('mo_reg_no');
        return Datatables::of($Childgrowth)->addColumn('Select', function($Childgrowth) { return '<input class="flat Childgrowth_record" name="Childgrowth_record"  type="checkbox" value="'.$Childgrowth->id.'" />';})
                ->addColumn('actions', function ($Childgrowth) {
                $column='<a href="'.route('Childgrowthview',$Childgrowth->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Childgrowthedit',$Childgrowth->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Childgrowthdelete',$Childgrowth->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
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
  'age' => 
  array (
  ),
  'length' => 
  array (
  ),
  'complaints' => 
  array (
  ),
  'staff_id' => 
  array (
  ),
  'ch_reg_no' => 
  array (
    0 => 'string',
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Childgrowth Could not be  Saved');
            }
            if($request['id'] !=''):
                $Childgrowth = Childgrowth::where('id',$request['id'])->first();    
                $Childgrowth->date=strip_tags($request["date"]);$Childgrowth->weight=strip_tags($request["weight"]);$Childgrowth->age=strip_tags($request["age"]);$Childgrowth->length=strip_tags($request["length"]);$Childgrowth->complaints=strip_tags($request["complaints"]);$Childgrowth->staff_id=$request["staff_id"];$Childgrowth->ch_reg_no=strip_tags($request["ch_reg_no"]);$Childgrowth->mo_reg_no=$request["mo_reg_no"];
                $Childgrowth->save();
                return $this->Response->prepareResult(200,$Childgrowth,[],'Childgrowth Saved successfully ','ajax');
            else:
                $Childgrowth=new Childgrowth();    
                $Childgrowth->date=strip_tags($request["date"]);$Childgrowth->weight=strip_tags($request["weight"]);$Childgrowth->age=strip_tags($request["age"]);$Childgrowth->length=strip_tags($request["length"]);$Childgrowth->complaints=strip_tags($request["complaints"]);$Childgrowth->staff_id=$request["staff_id"];$Childgrowth->ch_reg_no=strip_tags($request["ch_reg_no"]);$Childgrowth->mo_reg_no=$request["mo_reg_no"];
                $Childgrowth->save();
                return $this->Response->prepareResult(200,$Childgrowth,[],'Childgrowth Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Childgrowth Could not be  Saved');
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
                $data=Childgrowth::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Childgrowth_view');
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
                $data=Childgrowth::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Childgrowth_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Childgrowth_add');
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
                Childgrowth::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Childgrowth Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Childgrowth Item Could be not deleted');
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
                Childgrowth::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Childgrowth Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Childgrowth Item/s Could be not deleted');
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
