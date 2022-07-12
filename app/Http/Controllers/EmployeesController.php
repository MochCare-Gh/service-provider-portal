<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employees;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class EmployeesController extends Controller
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
        return View('Employees');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Employees=Employees::query();
        
        return Datatables::of($Employees)->addColumn('Select', function($Employees) { return '<input class="flat Employees_record" name="Employees_record"  type="checkbox" value="'.$Employees->id.'" />';})
                ->addColumn('actions', function ($Employees) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Employeesedit',$Employees->id).'" class="edit btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Employeesdelete',$Employees->id).'" class="delete btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $column;})->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request)
    {
        try {
            if($request['id'] !=''):
                $Employees = Employees::where('id',$request['id'])->first();    
                $Employees->name=strip_tags($request["name"]);$Employees->salary=strip_tags($request["salary"]);$Employees->job_title=strip_tags($request["job_title"]);
                $Employees->save();
                return $this->Response->prepareResult(200,$Employees,[],'Employees Saved successfully ','ajax');
            else:
                $Employees=new Employees();    
                $Employees->name=strip_tags($request["name"]);$Employees->salary=strip_tags($request["salary"]);$Employees->job_title=strip_tags($request["job_title"]);
                $Employees->save();
                return $this->Response->prepareResult(200,$Employees,[],'Employees Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Employees Could not be  Saved');
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
                $data=Employees::where('id',$ID)->get();
                return $this->Response->prepareResult(200,$data,[],null,'ajax');
            } catch (\Exception $exc) {
                 return $this->Response->prepareResult(400,[],null,'ajax','Could not get This item');
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
                Employees::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Employees Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Employees Item Could be not deleted');
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
                Employees::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Employees Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Employees Item/s Could be not deleted');
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
