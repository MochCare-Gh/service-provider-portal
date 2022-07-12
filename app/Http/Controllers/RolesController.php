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
use App\PermissionRole;
use config;
use App\Http\Controllers\ResponseController;

Class RolesController extends Controller
{

    public $Now;
    public $Response;
    public function __construct()
    {
        parent::__construct();
        $this->Now = date('Y-m-d H:i:s');
        $this->Response=new ResponseController();
    }

    //Role Manipulation
    private function createRole(Request $request)
    {
        $RoleName = $request->input('name');
        $Slug = $request->input('slug');
        $Description = $request->input('description');
        $Level = $request->input('level');
        $adminRole = Role::create(['name' => $RoleName, 'slug' => $Slug, 'description' => $Description, 'level' => $Level,]);
    }

    private function EditRole(Request $request)
    {

        $ID = $request->input('id');
        $RoleName = $request->input('name');
        $Slug = $request->input('slug');
        $Description = $request->input('description');
        $Level = $request->input('level');
        Role::where('id', $ID)->update(['name' => $RoleName, 'slug' => $Slug, 'description' => $Description, 'level' => $Level]);
    }

    private function DeleteRole(Request $request)
    {
        return true;
        $id = explode(',', $request->input('id'));
        Role::whereIn('id', $id)->delete();
    }

    public function Roles()
    {
        try {
             $Permissions = Permission::all();
             return $this->Response->prepareResult(200, ['perms' => $Permissions], [],'','view','users/roles');
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [],'');
        }

    }

    public function GetRoles()
    {
        $Roles = Role::all();
        return Datatables::of($Roles)->addColumn('Select', function($Roles) { return '<input class="flat role_record" name="role_record"  type="checkbox" value="'.$Roles->id.'" />';})
                ->addColumn('actions', function ($Roles) {
                $column = '<a href="javascript:void(0)"  data-url="' . route('rolesedit', $Roles->id) . '" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column .= '<a href="javascript:void(0)" data-url="' . route('rolesdelete', $Roles->id) . '" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                return $column;
            })->make(true);
    }

    public function Edit($ID)
    {
        try {
            $data=Role::with('perms')->where('id', $ID)->get();
            return $this->Response->prepareResult(200, $data, [],'');
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [],'');
        }
    }

    public function Delete($ID)
    {
        try {
                if(config('sysconfig.roles.delete')){
                    Role::where('id', $ID)->delete();
                    return $this->Response->prepareResult(200, [], [], 'Role Deleted Successfully !');
                }
                else{return $this->Response->prepareResult(400, [], [], 'Could not Delete Role in Demo Version'); }
            } catch (\Exception $exc) {
                return $this->Response->prepareResult(400, [], [], 'Could not Delete Role in Demo Version');
            } 
    }
    
    /**
     * Delete Multiple roles
     * @param Request $request
     * @return type
     */
    public function DeleteMultiple(Request $request)
    {
        try {
                if(config('sysconfig.roles.delete')){
                    Role::whereIn('id', $request->selected_rows)->delete();
                    return $this->Response->prepareResult(200, [], [], 'Role/s Deleted Successfully !');
                }
                else{return $this->Response->prepareResult(400, [], [], 'Could not Delete Role/s in Demo Version'); }
            } catch (\Exception $exc) {
                return $this->Response->prepareResult(400, [], [], 'Could not Delete Role/s in Demo Version');
            } 
    }
    
    public function CreateOrUpdate(Request $request)
    {        
        try {
                $All_input = $request->input();
                $ValidationResult = $this->ValidateCreateUpdate($request);
                if ($ValidationResult->fails()):
                    return response()->json($ValidationResult->errors(), 404);
                else:
                    if ($request['id'] != ''):
                        $Role = Role::where('id', $All_input['id'])->first();
                        $Role->name = $All_input['name'];
                        $Role->display_name = $All_input['display_name'];
                        $Role->description = $All_input['description'];
                        $Role->save();
                    //Role::where('id',$All_input['id'])->update(array('name'=>$All_input['name'],'display_name'=>$All_input['display_name'],'description'=>$All_input['description']));
                    else:
                        $Role = new Role();
                        $Role->name = $All_input['name'];
                        $Role->display_name = $All_input['display_name'];
                        $Role->description = $All_input['description'];
                        $Role->save();
                    //Role::insert(array('name'=>$All_input['name'],'display_name'=>$All_input['display_name'],'description'=>$All_input['description']));    
                    endif;
                    if (isset($All_input['permissions']) && count($All_input['permissions']) > 0):
                        $Role->perms()->sync($All_input['permissions']);
                    else:
                        $Role->perms()->sync([]);
                    endif;

                endif;
                return $this->Response->prepareResult(200, $Role, [], 'Role Saved successfully');
        } catch (\Exception $exc) {
                return $this->Response->prepareResult(400, [], [], 'Could not Create Role');
        }

    }

    protected function ValidateCreateUpdate(Request $request)
    {
        return Validator::make($request->all(), ['name' => 'required|max:255', 'display_name' => 'required|max:255', 'description' => 'required|max:255']);
    }
}
