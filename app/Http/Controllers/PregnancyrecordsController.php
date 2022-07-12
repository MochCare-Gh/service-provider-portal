<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pregnancyrecords;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class PregnancyrecordsController extends Controller
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
        return View('Pregnancyrecords_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Pregnancyrecords=Pregnancyrecords::query();
        $Pregnancyrecords=$Pregnancyrecords->with('rec_mo_reg_no');
        return Datatables::of($Pregnancyrecords)->addColumn('Select', function($Pregnancyrecords) { return '<input class="flat Pregnancyrecords_record" name="Pregnancyrecords_record"  type="checkbox" value="'.$Pregnancyrecords->id.'" />';})
                ->addColumn('actions', function ($Pregnancyrecords) {
                $column='<a href="'.route('Pregnancyrecordsview',$Pregnancyrecords->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                $column.='<a href="'.route('Pregnancyrecordsedit',$Pregnancyrecords->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Pregnancyrecordsdelete',$Pregnancyrecords->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
  'rec_mo_reg_no' => 
  array (
    0 => 'string',
  ),
  'rec_no_of_pregnancies' => 
  array (
  ),
  'rec_no_of_births' => 
  array (
    0 => 'integer',
  ),
  'rec_no_of_abortions' => 
  array (
  ),
  'rec_spontaneous' => 
  array (
  ),
  'rec_induced' => 
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Pregnancyrecords Could not be  Saved');
            }
            if($request['id'] !=''):
                $Pregnancyrecords = Pregnancyrecords::where('id',$request['id'])->first();    
                $Pregnancyrecords->rec_mo_reg_no=$request["rec_mo_reg_no"];$Pregnancyrecords->rec_no_of_pregnancies=strip_tags($request["rec_no_of_pregnancies"]);$Pregnancyrecords->rec_no_of_births=strip_tags($request["rec_no_of_births"]);$Pregnancyrecords->rec_no_of_abortions=strip_tags($request["rec_no_of_abortions"]);$Pregnancyrecords->rec_spontaneous=strip_tags($request["rec_spontaneous"]);$Pregnancyrecords->rec_induced=strip_tags($request["rec_induced"]);
                $Pregnancyrecords->save();
                return $this->Response->prepareResult(200,$Pregnancyrecords,[],'Pregnancyrecords Saved successfully ','ajax');
            else:
                $Pregnancyrecords=new Pregnancyrecords();    
                $Pregnancyrecords->rec_mo_reg_no=$request["rec_mo_reg_no"];$Pregnancyrecords->rec_no_of_pregnancies=strip_tags($request["rec_no_of_pregnancies"]);$Pregnancyrecords->rec_no_of_births=strip_tags($request["rec_no_of_births"]);$Pregnancyrecords->rec_no_of_abortions=strip_tags($request["rec_no_of_abortions"]);$Pregnancyrecords->rec_spontaneous=strip_tags($request["rec_spontaneous"]);$Pregnancyrecords->rec_induced=strip_tags($request["rec_induced"]);
                $Pregnancyrecords->save();
                return $this->Response->prepareResult(200,$Pregnancyrecords,[],'Pregnancyrecords Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Pregnancyrecords Could not be  Saved');
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
                $data=Pregnancyrecords::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','Pregnancyrecords_view');
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
                $data=Pregnancyrecords::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','Pregnancyrecords_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','Pregnancyrecords_add');
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
                Pregnancyrecords::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Pregnancyrecords Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Pregnancyrecords Item Could be not deleted');
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
                Pregnancyrecords::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Pregnancyrecords Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Pregnancyrecords Item/s Could be not deleted');
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
