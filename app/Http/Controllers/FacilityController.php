<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Facility;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class FacilityController extends Controller
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
        return View('Facility_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Facility=Facility::query();
        
        return Datatables::of($Facility)->addColumn('Select', function($Facility) { return '<input class="flat Facility_record" name="Facility_record"  type="checkbox" value="'.$Facility->id.'" />';})
                ->addColumn('actions', function ($Facility) {
                $column='<a href="'.route('Facilityview',$Facility->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Facilityedit',$Facility->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Facilitydelete',$Facility->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'fac_name' => 
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Facility Could not be  Saved');
            }
            if($request['id'] !=''):
                $Facility = Facility::where('id',$request['id'])->first();    
                $Facility->fac_name=strip_tags($request["fac_name"]);
                $Facility->save();
                return $this->Response->prepareResult(200,$Facility,[],'Facility Saved successfully ','ajax');
            else:
                $Facility=new Facility();    
                $Facility->fac_name=strip_tags($request["fac_name"]);
                $Facility->save();
                return $this->Response->prepareResult(200,$Facility,[],'Facility Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Facility Could not be  Saved');
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
                $data=Facility::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Facility_view');
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
                $data=Facility::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Facility_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Facility_add');
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
                Facility::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Facility Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Facility Item Could be not deleted');
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
                Facility::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Facility Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Facility Item/s Could be not deleted');
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
