<?php
namespace App\Http\Controllers;

Use App\User;
Use App\Role;
Use App\Permission;
Use App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Validator;
use config;
use App\Http\Controllers\ResponseController;

Class PermissionsController extends Controller
{

    public $Now;
    public $Response;
    public function __construct()
    {
        parent::__construct();
        $this->Now = date('Y-m-d H:i:s');
        $this->Response=new ResponseController();
    }

    public function Permissions()
    {
        return View('users/permissions');
    }
    /**
     * Get All permissions
     * @return JSON
     */
    public function GetPermissions()
    {
        $permissions = Permission::orderBy('id', 'asc');
        return Datatables::of($permissions)->addColumn('Select', function($permissions) { return '<input class="flat permission_record" name="permission_record"  type="checkbox" value="'.$permissions->id.'" />';})
                ->addColumn('action', function ($permissions) {
                $column = '<a href="javascript:void(0)" data-url="' . route('permissionsedit', $permissions->id) . '"  class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column .= '<a href="javascript:void(0)" data-url="' . route('permissionsdelete', $permissions->id) . '" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;
            })->make(true);
    }
    
    /**
     * Permissions page
     * @return view
     */
    public function MangePermissions()
    {
        return View('users/managepermissions');
    }
    
    /**
     * Edit Permission
     * @param type $ID
     * @return JSON
     */
    public function Edit($ID)
    {
        try {
            $data=Permission::where('id', $ID)->get();
            return $this->Response->prepareResult(200, $data, [],'');
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [],'');
        }        
    }
    
    /**
     * Delete Permission
     * @param type $ID
     * @return JSON
     */
    public function Delete($ID)
    {
        try {
                if(config('sysconfig.permissions.delete')){
                    Permission::where('id', $ID)->delete();
                    return $this->Response->prepareResult(400, [], [],'Permissions Deleted Successfully !');
                }
                else{ 
                    return $this->Response->prepareResult(400, [], [],'Could not Delete Permissions in Demo Version');
                }
        } catch (\Exception $exc) {
                    return $this->Response->prepareResult(400, [], [],'Could not Delete Permissions in Demo Version');
        }
    }
    
    /**
     * Delete Multiple Permissions
     * @param Request $request
     * @return JSON
     */
    public function DeleteMultiple(Request $request)
    {
        try {
                if(config('sysconfig.permissions.delete')){
                    Permission::whereIn('id', $request->selected_rows)->delete();
                    return $this->Response->prepareResult(400, [], [],'Permission/s Deleted Successfully !');
                }
                else{ 
                    return $this->Response->prepareResult(400, [], [],'Could not Delete Permission/s in Demo Version');
                }
        } catch (\Exception $exc) {
                    return $this->Response->prepareResult(400, [], [],'Could not Delete Permission/s in Demo Version');
        }
    }
    
    /**
     * Create or Update Permission
     * @param \Illuminate\Http\Request $request
     * @return JSON
     */
    public function CreateOrUpdate(Request $request)
    {
        try {
            $All_input = $request->input();
            $ValidationResult = $this->ValidateCreateUpdate($request);
            if ($ValidationResult->fails()):
                return response()->json($ValidationResult->errors(), 404);
            else:
                if ($request['id'] != ''):
                    $Permission = Permission::where('id', $All_input['id'])->first();
                    $Permission->name =$All_input['name'];
                    $Permission->display_name = $All_input['display_name'];
                    $Permission->description = $All_input['description'];
                    $Permission->save();
                else:
                    $Permission = new Permission();
                    $Permission->name =$All_input['name'];
                    $Permission->display_name = $All_input['display_name'];
                    $Permission->description = $All_input['description'];
                    $Permission->save();                    
                endif;
            endif;
            return $this->Response->prepareResult(200, $Permission, [], 'Permission Saved successfully');
        } catch (\Exception $exc) {
                return $this->Response->prepareResult(400, [], [], 'Could not Create Permission');
        }
    }
    
    /**
     * Validate Create or update permission
     * @param \Illuminate\Http\Request $request
     * @return type
     */
    protected function ValidateCreateUpdate(Request $request)
    {
        return Validator::make($request->all(), ['name' => 'required|max:255', 'display_name' => 'required|max:255', 'description' => 'required|max:255']);
    }
}
