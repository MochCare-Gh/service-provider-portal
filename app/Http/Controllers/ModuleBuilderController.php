<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Schema;
use Artisan;
use App\Fields;
use App\Modules;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\ModuleFields;
use Illuminate\Filesystem\Filesystem;
use Auth;
use Illuminate\Support\Composer;
use App\Menus;
use App\Migrations;
use App\Permission;
use App\Role;
use Dompdf\Dompdf;
use App\Widgets;
use App\ApiDocumentation;
//use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Class ModuleBuilderController extends Controller {

    protected $files;
    private $dataBaseName;
    protected $ModuleID;
    protected $ModuleName;
    protected $ModuleNameStripped;
    protected $ModuleTableName;
    protected $ModuleIcon;
    protected $ModuleFields;
    protected $composer;
    protected $ReservedFields = array('id', 'created_at', 'updated_at', 'deleted_at');

    public function __construct(Filesystem $files, Composer $composer) {
        parent::__construct();
        $this->composer = $composer;
        $this->files = $files;
        $this->dataBaseName = DB::connection()->getDatabaseName();
    }

    public function index() {
        //Show Tables
        $AllTables = DB::select('SHOW TABLES');
        foreach ($AllTables as $tableObject) {
            $DBkey = 'Tables_in_' . strtolower($this->dataBaseName);
            $Table = $tableObject->$DBkey;
            $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM `' . $Table . '`'));
            $FinalTables[$Table] = json_encode($table_info_columns);
        }
        return view('modulebuilder/index', array('FinalTablesInfo' => json_encode($FinalTables)));
    }

    public function Builder() {
        //Show Tables
        $AllTables = DB::select('SHOW TABLES');
        foreach ($AllTables as $tableObject) {
            $DBkey = 'Tables_in_' . strtolower($this->dataBaseName);
            $Table = $tableObject->$DBkey;
            $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM `' . $Table . '`'));
            $FinalTables[$Table] = json_encode($table_info_columns);
        }
        $Fields = Fields::select('id', 'field_name')->where('status', 1)->get()->toJson();
        return view('modulebuilder/builder', array('FinalTablesInfo' => json_encode($FinalTables), 'field_types' => $Fields));
    }

    /**
     * Get Menu Items List
     * @return type
     */
    public function menu() {
        $GetMenuList = Menus::where('parent', 0)->with('children')->orderBy('parent', 'asc')->orderBy('hierarchy', 'asc')->get();
        return view('modulebuilder.menu', array('MenuList' => $GetMenuList));
    }

    public function SaveMenuSorting(Request $request) {
        for ($mi = 0; $mi < count($request['menu']); $mi++):
            Menus::where('id', $request['menu'][$mi]['id'])->update(['parent' => 0, 'hierarchy' => $mi + 1]);
            if (isset($request['menu'][$mi]['children'])):
                for ($mich = 0; $mich < count($request['menu'][$mi]['children']); $mich++):
                    Menus::where('id', $request['menu'][$mi]['children'][$mich]['id'])->update(['parent' => $request['menu'][$mi]['id'], 'hierarchy' => $mich + 1]);
                endfor;
            endif;
        endfor;
    }

    /**
     * Create New Menu item
     * @param \Illuminate\Http\Request $request
     */
    public function MenusCreateOrUpdate(Request $request) {
        $MenuItem = new Menus();
        $MenuItem->name = ucfirst($request->name);
        $MenuItem->permission_name = NULL;
        $MenuItem->url = '#';
        $MenuItem->icon = $request->icon;
        $MenuItem->type = 'menuItem';
        $MenuItem->parent = 0;
        $MenuItem->hierarchy = 0;
        $MenuItem->module_id = 0;
        $MenuItem->save();
    }

    /**
     * Delete Menu Item
     * @param type $MenuID
     */
    public function MenusDelete($MenuID) {
        Menus::where(array('id' => $MenuID, 'type' => 'menuItem'))->delete();
        Menus::where('parent', $MenuID)->update(['parent' => 0]);
        return redirect()->back();
    }

    /**
     * Modules Page
     * @return type
     */
    public function Modules() {
        //Show Tables
        $AllTables = DB::select('SHOW TABLES');
        foreach ($AllTables as $tableObject) {
            $DBkey = 'Tables_in_' . strtolower($this->dataBaseName);
            $Table = $tableObject->$DBkey;
            $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM `' . $Table . '`'));
            $FinalTables[$Table] = json_encode($table_info_columns);
        }
        $Fields = Fields::select('id', 'field_name')->where('status', 1)->get()->toJson();
        return view('modulebuilder/all_modules', array('FinalTablesInfo' => json_encode($FinalTables), 'field_types' => $Fields));
    }

    /**
     * Get Module List 
     */
    public function ModulesList() {
        $Modules = Modules::all();
        return Datatables::of($Modules)->addColumn('Select', function($Modules) {
                            return '<input class="flat module_record" name="module_record"  type="checkbox" value="' . $Modules->id . '" />';
                        })
                        ->addColumn('actions', function ($Modules) {
                            $column = '<a href="javascript:void(0)"  data-url="' . route('module_edit', $Modules->id) . '" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';

                            if ($Modules->status == 0):
                                $column .= '<a href="' . route('module_configure', $Modules->id) . '" data-url="' . route('module_configure', $Modules->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-cog"></i> Configure</a>';
                            else:
                                $column .= '<a href="' . route('module_configure', $Modules->id) . '" data-url="' . route('module_configure', $Modules->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-cog"></i> Re-Configure</a>';
                                $column .= '<a href="' . route('WidgetsIndex', $Modules->id) . '" data-url="' . route('WidgetsIndex', $Modules->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-stats"></i> Widgets</a>';
                            endif;
                                $column .= '<a href="javascript:void(0)" data-url="' . route('module_delete', $Modules->id) . '" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                            return $column;
                        })->make(true);
    }

    public function CreateUpdateModule(Request $request) {
        if ($request['id'] != ''):
            $Module = Modules::where('id', $request['id'])->first();
            $Module->module_name = preg_replace('/[^A-Za-z0-9\_]/', '', rtrim($request->input('module_name')));
            $Module->module_icon = $request->input('module_icon');
            $Module->save();
            return response()->json(['data' => $Module], 200);
        else:
            $ValidationResult = $this->ValidateCreateModule($request);
            if ($ValidationResult->fails()):
                return response()->json($ValidationResult->errors(), 404);
            else:
                $NewModule = new Modules();
                $NewModule->module_name = preg_replace('/[^A-Za-z0-9\_]/', '', rtrim($request->input('module_name')));
                $NewModule->module_icon = $request->input('module_icon');
                $NewModule->save();
                return response()->json(['data' => $NewModule], 200);
            endif;
        endif;
    }

    /**
     * Validate Create Module entry
     * @param \Illuminate\Http\Request $request
     * @return type
     */
    function ValidateCreateModule(Request $request) {
        $request->merge(['module_name' => preg_replace('/[^A-Za-z0-9\_]/', '', rtrim($request->input('module_name')))]);
        Validator::extend('CheckIfClassExist', function($attribute, $value, $parameters) {
            return !Schema::hasTable($value);
        });

        return Validator::make($request->all(), ['module_name' => 'required|unique:modules|max:255|CheckIfClassExist', 'module_icon' => 'required|max:50']);
    }

    /**
     * Delete Module Files and Remove it's related Records from CRUD
     * @param type $ID
     */
    public function DeleteModule($ID, $RemoveModule = true) {
        $Module = Modules::select('*')->where('id', $ID)->first();
        $this->ModuleID = $Module->id;
        $this->ModuleName = $Module->module_name;
        $this->ModuleTableName = trim($Module->module_table_name);
        $this->ModuleNameStripped = strtolower(preg_replace(array('@ @'), array('_'), $Module->module_name));
        $this->RemoveFiles();
        $this->RemvoeModuleRecords($RemoveModule);
    }

    /**
     * Delete Multiple Modules Files and Remove it's related Records from CRUD
     * @param Request $request
     * @param Boolean $RemoveModule
     */
    public function DeleteMultipleModules(Request $request, $RemoveModule = true) {
        $Modules = Modules::select('*')->whereIn('id', $request->selected_rows)->get();
        if ($Modules->count() > 0) {
            foreach ($Modules as $Module) {
                $this->ModuleID = $Module->id;
                $this->ModuleName = $Module->module_name;
                $this->ModuleTableName = trim($Module->module_table_name);
                $this->ModuleNameStripped = strtolower(preg_replace(array('@ @'), array('_'), $Module->module_name));
                $this->RemoveFiles();
                $this->RemvoeModuleRecords($RemoveModule);
            }
        }
    }

    /**
     * Edit Module
     * @param type $ID
     * @return type
     */
    public function EditModule($ID) {
        return Modules::where('id', $ID)->get()->toJson();
    }

    public function ConfigureModule($ModuleID) {
        $GetTableNames = $this->GetTableNames();
        $AllTables = DB::select('SHOW TABLES');
        foreach ($AllTables as $tableObject) {
            $DBkey = 'Tables_in_' . strtolower($this->dataBaseName);
            $Table = $tableObject->$DBkey;
            $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM `' . $Table . '`'));
            $FinalTables[$Table] = $table_info_columns;
        }
        $Module = Modules::where('id', $ModuleID)->get();
        $Fields = Fields::select('id', 'field_name', 'field_text')->where('status', 1)->get()->toJson();
        return view('modulebuilder/builder', array('GetTableNames' => json_encode($GetTableNames), 'FinalTablesInfo' => json_encode($FinalTables), 'field_types' => $Fields, 'module' => $Module, 'module_id' => $ModuleID));
    }

    public function ModuleFields($ModuleID) {
        //$Fields=ModuleFields::with('Modules')->where('module_id',$ModuleID);
        $Fields = ModuleFields::select('module_fields.id', 'module_fields.field_name', 'module_fields.field_label', 'module_fields.related_table',
                                'module_fields.related_table_field', 'module_fields.related_table_field_display', DB::raw('UPPER(fields.field_name) as field_type'), 'module_fields.validation_rules', 'module_fields.show_in_list', 'module_fields.created_at')
                        ->join('fields', 'fields.id', '=', 'module_fields.field_type')->where('module_id', $ModuleID);
        return Datatables::of($Fields)->addColumn('Select', function($Fields) {
                            return '<input class="flat field_record" name="field_record"  type="checkbox" value="' . $Fields->id . '" />';
                        })
                        ->addColumn('actions', function ($Fields) {
                            $column = '<a href="javascript:void(0)"  data-url="' . route('field_edit', $Fields->id) . '" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                            $column .= '<a href="javascript:void(0)" data-url="' . route('field_delete', $Fields->id) . '" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                            return $column;
                        })->editColumn('show_in_list', function($Fields) {
                    $Class = $Fields->show_in_list ? 'fa fa-check' : 'fa fa-close';
                    $column = '<i class="' . $Class . '">';
                    return $column;
                })->escapeColumns([])->make(true);
    }

    /**
     * Create or update field
     * @param Request $request
     */
    public function CreateUpdateField(Request $request) {

        if ($request->input('id') != ''):
            $Field = ModuleFields::where('id', $request->input('id'))->first();
            $Field->field_name = strtolower(preg_replace(array('@ @'), array('_'), preg_replace('/[^A-Za-z0-9\_]/', '', rtrim($request->input('field_name')))));
            $Field->field_label = $request->input('field_label');
            $Field->field_type = $request->input('field_type');
            $Field->related_table = $request->input('related_table');
            $Field->related_table_field = $request->input('related_table_field');
            $Field->related_table_field_display = $request->input('related_table_field_display');
            $Field->field_length = ($request->filled('field_length') == true) ? $request->input('field_length') : 0;
            $Field->field_options = $request->input('field_options');
            $Field->show_in_list = $request->input('show_in_list');
            $Field->module_id = $request->input('module_id');
            $Field->validation_rules = $this->encodeValidationRules($request);
            $Field->save();
        else:
            $Field = new ModuleFields();
            $Field->field_name = strtolower(preg_replace(array('@ @'), array('_'), preg_replace('/[^A-Za-z0-9\_]/', '', rtrim($request->input('field_name')))));
            $Field->field_label = $request->input('field_label');
            $Field->field_type = $request->input('field_type');
            $Field->related_table = $request->input('related_table');
            $Field->related_table_field = $request->input('related_table_field');
            $Field->related_table_field_display = $request->input('related_table_field_display');
            $Field->field_length = ($request->filled('field_length') == true) ? $request->input('field_length') : 0;
            $Field->field_options = $request->input('field_options');
            $Field->show_in_list = $request->input('show_in_list');
            $Field->module_id = $request->input('module_id');
            $Field->validation_rules = $this->encodeValidationRules($request);
            $Field->save();
        endif;
    }

    private function encodeValidationRules(Request $request) {

        $ValidationArray = [];
        ($request->filled('validation_min') && $request->filled('validation_min_value')) ? $ValidationArray['min'] = (integer) $request->validation_min_value : '';
        ($request->filled('validation_max') && $request->filled('validation_max_value')) ? $ValidationArray['max'] = (integer) $request->validation_max_value : '';
        ($request->filled('validation_unique')) ? $ValidationArray['unique'] = $request->validation_unique : '';
        $request->filled('validation_field_type') ? $ValidationArray['type'] = $request->validation_field_type : '';
        return json_encode($ValidationArray);
    }

    public function EditField($ID) {
        return ModuleFields::where('id', $ID)->get()->toJson();
    }

    /**
     * Delete Field
     * @param type $ID
     */
    public function DeleteField($ID) {
        ModuleFields::where('id', $ID)->delete();
    }

    /**
     * Delete Multiple fields
     * @param Request $request
     */
    public function DeleteMultipleFields(Request $request) {
        ModuleFields::whereIn('id', $request->selected_rows)->delete();
    }

    public function GenerateModule(Request $request, $ModuleID) {
        //Delete Previous Module if Exists
        $this->DeleteModule($ModuleID, false);
        $Module = Modules::select('*')->where('id', $ModuleID)->first();
        $this->ModuleID = $Module->id;
        $this->ModuleName = $Module->module_name;
        $this->ModuleNameStripped = strtolower(preg_replace(array('@ @'), array('_'), $Module->module_name));
        $this->ModuleIcon = strtolower(preg_replace(array('@ @'), array('_'), $Module->module_icon));
        $this->ModuleFields = ModuleFields::join('fields', 'fields.id', '=', 'module_fields.field_type')->select('module_fields.field_name as module_field_name', 'module_fields.field_label', 'module_fields.related_table',
                        'module_fields.related_table_field', 'module_fields.related_table_field_display', 'module_fields.field_length', 'module_fields.validation_rules', 'module_fields.show_in_list', 'module_fields.field_options', 'fields.field_name as field_type')->where('module_id', $ModuleID)->whereNotIn('module_fields.field_name', $this->ReservedFields)->orderBy('module_fields.id')->get();

        return $this->GenerateFiles();
    }

    public function GenerateView() {
        //View Stub
        $View = $this->files->get(app_path('Http/stubs/view.stub'));
        $View = preg_replace(array('@ngapp@', '@ngappcontroller@', '@module@', '@item@'), array('ngUsersApp', 'ngAppController', 'users', 'user'), $View);
        $this->files->put(resource_path('views/Name.blade.php'), $View);
    }

    private function GenerateCrudRoutes() {

        //Generate Crud Routes File for Web
        $CrudRoutesFiles = $this->files->files(base_path() . '/routes/WebCrudRoutes');
        $CrudRoutesLines = '';
        foreach ($CrudRoutesFiles as $CrudRouteFile):
            $CrudRouteFile = pathinfo($CrudRouteFile);
            $CrudRoutesLines .= "require(base_path() . '/routes/WebCrudRoutes/" . $CrudRouteFile['basename'] . "');";
        endforeach;
        $RoutesFile = $this->files->get(app_path('Http/stubs/CrudRoutes.stub'));
        $RoutesFile = preg_replace(array('@Routes@'), array($CrudRoutesLines), $RoutesFile);
        $this->files->put(base_path('routes/WebCrudRoutes.php'), $RoutesFile);

        //Generate Crud Routes File for Api
        $CrudRoutesFiles = $this->files->files(base_path() . '/routes/ApiCrudRoutes');
        $CrudRoutesLines = '';
        foreach ($CrudRoutesFiles as $CrudRouteFile):
            $CrudRouteFile = pathinfo($CrudRouteFile);
            $CrudRoutesLines .= "require(base_path() . '/routes/ApiCrudRoutes/" . $CrudRouteFile['basename'] . "');";
        endforeach;
        $RoutesFile = $this->files->get(app_path('Http/stubs/CrudRoutes.stub'));
        $RoutesFile = preg_replace(array('@Routes@'), array($CrudRoutesLines), $RoutesFile);
        $this->files->put(base_path('routes/ApiCrudRoutes.php'), $RoutesFile);
    }

    protected function GenerateFiles() {
        //Check if Module exists
        if ($this->CheckMigrationClass(ucfirst($this->ModuleNameStripped))) {
            return response()->json(['message' => 'Could not Generate Module or it is already Generated']);
        }
        //Contoller Stub
        $FormFields = '';
        $EditColumns = '';
        $Joins = '';
        $OneToOneRelation = '';
        $With = '';
        $ChangeDateFormate = '';
        $validationRules = [];
        foreach ($this->ModuleFields as $Field):
            //Add validation Rules
            //dd($Field->module_field_name);
            $validationRules[$Field->module_field_name] = $this->getFieldVailtionRules($Field);
            switch ($Field->field_type) {
                case 'image':
                    $FormFields .= '$ImagePath=$this->Upload($request,"' . $Field->module_field_name . '");';
                    $FormFields .= '$' . ucfirst($this->ModuleNameStripped) . '->' . $Field->module_field_name . '=' . '$ImagePath;';
                    //Edit Fields
                    $EditColumns .= "editColumn('" . $Field->module_field_name . "',function($" . ucfirst($this->ModuleNameStripped) . "){ return \"<img  width='70' class='img-circle img-responsive' src='files/\".$" . ucfirst($this->ModuleNameStripped) . "->" . $Field->module_field_name . ".\"' />\";})->";
                    break;
                case 'attachment':
                    $FormFields .= '$AttachmentPath=$this->Upload($request,"' . $Field->module_field_name . '");';
                    $FormFields .= '$' . ucfirst($this->ModuleNameStripped) . '->' . $Field->module_field_name . '=' . '$AttachmentPath;';
                    //Edit Fields
                    $EditColumns .= "editColumn('" . $Field->module_field_name . "',function($" . ucfirst($this->ModuleNameStripped) . "){ return \"<a  href='files/\".$" . ucfirst($this->ModuleNameStripped) . "->" . $Field->module_field_name . ".\"' />" . "$" . ucfirst($this->ModuleNameStripped) . "->" . $Field->module_field_name . " <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>\";})->";
                    break;
                case 'one_to_one_relation':
                    $OneToOneRelation .= "public function " . $Field->module_field_name . "(){ return \$this->belongsTo('App\\" . ucfirst($Field->related_table) . "', '" . $Field->module_field_name . "', '" . $Field->related_table_field . "');}";
//                    if($Joins==''):
//                    $Joins .="join('".$Field->related_table."', '".ucfirst($this->ModuleNameStripped).".".$Field->module_field_name."', '=', '".$Field->related_table.".".$Field->related_table_field."')";
//                    else:
//                    $Joins .="join('".$Field->related_table."', '".ucfirst($this->ModuleNameStripped).".".$Field->module_field_name."', '=', '".$Field->related_table.".".$Field->related_table_field."')->";    
//                    endif;
                    $FormFields .= '$' . ucfirst($this->ModuleNameStripped) . '->' . $Field->module_field_name . '=' . strip_tags('$request["' . $Field->module_field_name . '"]') . ';';
                    $With .= '$' . ucfirst($this->ModuleNameStripped) . '=$' . ucfirst($this->ModuleNameStripped) . "->with('" . $Field->module_field_name . "');";
                    break;
                case 'text':
                    $FormFields .= '$' . ucfirst($this->ModuleNameStripped) . '->' . $Field->module_field_name . '=' . '$request["' . $Field->module_field_name . '"];';
                    break;
                case 'date':
                    $FormFields .= '$' . ucfirst($this->ModuleNameStripped) . '->' . $Field->module_field_name . '=' . 'strip_tags($request["' . $Field->module_field_name . '"]);';
                    $ChangeDateFormate .= "public function set" . str_replace('_', '', ucwords($Field->module_field_name, '_')) . "Attribute(\$value){ \$this->attributes['" . $Field->module_field_name . "'] = date('Y-m-d',  strtotime(strtolower(\$value))); }";
                    $ChangeDateFormate .= "public function get" . ucwords($Field->module_field_name, '_') . "Attribute(\$value){ return date('d-m-Y',  strtotime(\$value)); }";
                    break;
                case 'datetime':
                    $FormFields .= '$' . ucfirst($this->ModuleNameStripped) . '->' . $Field->module_field_name . '=' . 'strip_tags($request["' . $Field->module_field_name . '"]);';
                    $ChangeDateFormate .= "public function set" . $Field->module_field_name . "Attribute(\$value){ \$date = \DateTime::createFromFormat('d-m-Y H-i-s',\$value);" . "\$this->attributes['" . $Field->module_field_name . "'] = \$date->format('Y-m-d H:i:s');  }";
                    $ChangeDateFormate .= "public function get" . $Field->module_field_name . "Attribute(\$value){ return date('d-m-Y H-i-s',  strtotime(\$value)); }";
                    break;
                default:
                    $FormFields .= '$' . ucfirst($this->ModuleNameStripped) . '->' . $Field->module_field_name . '=' . 'strip_tags($request["' . $Field->module_field_name . '"]);';
                    break;
            }

        endforeach;
        //$Joins=($Joins!='')?$Joins:'all()';

        $Controller = $this->files->get(app_path('Http/stubs/') . 'controller.stub');
        $Controller = preg_replace(array('@DummyNamespace@', '@DummyRootNamespaceHttp@', '@DummyClass@', '@{{ModelName}}@', '@{{form_fields}}@', '@{{EditColumns}}@', '@{{with}}@', '@{{RulesArray}}@'), array('App\Http\Controllers', 'App\Http', ucfirst($this->ModuleNameStripped) . 'Controller', ucfirst($this->ModuleNameStripped), $FormFields, $EditColumns, $With, var_export($validationRules, true)), $Controller);
        $this->files->put(app_path('Http/Controllers/' . ucfirst($this->ModuleNameStripped) . 'Controller.php'), $Controller);
        //Model Stub 
        $Model = $this->files->get(app_path('Http/stubs/model.stub'));
        $Model = preg_replace(array('@DummyNamespace@', '@DummyClass@', '@TableName@', '@DummyOneToOneRelation@', '@ChangeDateFormate@'), array('App', ucfirst($this->ModuleNameStripped), ucfirst($this->ModuleNameStripped), $OneToOneRelation, $ChangeDateFormate), $Model);
        $this->files->put(app_path(ucfirst($this->ModuleNameStripped) . '.php'), $Model);
        //View Stub
        $ViewItems = '<table class="table table-striped" >';
        $OneToOneModel = '';
        $View = $this->files->get(app_path('Http/stubs/view.stub'));
        $View = preg_replace(array('@{{module}}@', '@{{moduleitem}}@', '@{{ngapp}}@'), array(ucfirst($this->ModuleNameStripped), ucfirst($this->ModuleNameStripped) . 'Item', 'ng' . ucfirst($this->ModuleNameStripped) . 'App'), $View);
        foreach ($this->ModuleFields as $Field):
            switch ($Field->field_type) {
                case 'one_to_one_relation':
                    $ViewItems .= $this->ViewElementsHTML($Field);
                    $RelatedTable = ucfirst($Field->related_table);
                    $OneToOneModel .= '$scope.' . $Field->related_table . '={!! App\\' . ucfirst($Field->related_table) . '::all()->toJson() !!};';
                    break;
                default:
                    $ViewItems .= $this->ViewElementsHTML($Field);
                    break;
            }

        endforeach;
        $ViewItems .= '</table>';
        $View = preg_replace(array('@{{formitems}}@', '@{{OneToOneModel}}@'), array($ViewItems, $OneToOneModel), $View);
        $this->files->put(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_view.blade.php'), $View);

        //Edit Stub
        $FormItems = '';
        $OneToOneModel = '';
        $Edit = $this->files->get(app_path('Http/stubs/edit.stub'));
        $Edit = preg_replace(array('@{{module}}@', '@{{moduleitem}}@', '@{{ngapp}}@'), array(ucfirst($this->ModuleNameStripped), ucfirst($this->ModuleNameStripped) . 'Item', 'ng' . ucfirst($this->ModuleNameStripped) . 'App'), $Edit);
        foreach ($this->ModuleFields as $Field):
            switch ($Field->field_type) {
                case 'one_to_one_relation':
                    $FormItems .= $this->FormElementsHTML($Field);
                    $RelatedTable = ucfirst($Field->related_table);
                    $OneToOneModel .= '$scope.' . $Field->related_table . '={!! App\\' . ucfirst($Field->related_table) . '::all()->toJson() !!};';
                    break;
                default:
                    $FormItems .= $this->FormElementsHTML($Field);
                    break;
            }

        endforeach;
        $Edit = preg_replace(array('@{{formitems}}@', '@{{OneToOneModel}}@'), array($FormItems, $OneToOneModel), $Edit);
        $this->files->put(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_edit.blade.php'), $Edit);

        //add Stub
        $FormItems = '';
        $OneToOneModel = '';
        $Add = $this->files->get(app_path('Http/stubs/add.stub'));
        $Add = preg_replace(array('@{{module}}@', '@{{moduleitem}}@', '@{{ngapp}}@'), array(ucfirst($this->ModuleNameStripped), ucfirst($this->ModuleNameStripped) . 'Item', 'ng' . ucfirst($this->ModuleNameStripped) . 'App'), $Add);
        foreach ($this->ModuleFields as $Field):
            switch ($Field->field_type) {
                case 'one_to_one_relation':
                    $FormItems .= $this->FormElementsHTML($Field);
                    $RelatedTable = ucfirst($Field->related_table);
                    $OneToOneModel .= '$scope.' . $Field->related_table . '={!! App\\' . ucfirst($Field->related_table) . '::all()->toJson() !!};';
                    break;
                default:
                    $FormItems .= $this->FormElementsHTML($Field);
                    break;
            }

        endforeach;
        $Add = preg_replace(array('@{{formitems}}@', '@{{OneToOneModel}}@'), array($FormItems, $OneToOneModel), $Add);
        $this->files->put(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_add.blade.php'), $Add);

        //List Stub
        $ListTableHeader = '';
        $ListTableColumns = '';
        $List = $this->files->get(app_path('Http/stubs/list.stub'));
        $List = preg_replace(array('@{{module}}@', '@{{moduleitem}}@', '@{{ngapp}}@'), array(ucfirst($this->ModuleNameStripped), ucfirst($this->ModuleNameStripped) . 'Item', 'ng' . ucfirst($this->ModuleNameStripped) . 'App'), $List);
        foreach ($this->ModuleFields as $Field):
            switch ($Field->field_type) {
                case 'one_to_one_relation':
                    if ($Field->show_in_list):
                        $ListTableHeader .= "<th>" . $Field->field_label . "</th>";
                        $ListTableColumns .= "{data: '" . $Field->module_field_name . "." . $Field->related_table_field_display . "', name: '" . $Field->module_field_name . "'},";
                    endif;
                    break;
                default:
                    if ($Field->show_in_list):
                        $ListTableHeader .= "<th>" . $Field->field_label . "</th>";
                        $ListTableColumns .= "{data: '" . $Field->module_field_name . "', name: '" . $Field->module_field_name . "'},";
                    endif;
                    break;
            }

        endforeach;
        $List = preg_replace(array('@{{listtableheader}}@', '@{{listtablecolumns}}@'), array($ListTableHeader, $ListTableColumns), $List);
        $this->files->put(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_list.blade.php'), $List);

        //Route for API Stub
        $Route = $this->files->get(app_path('Http/stubs/api_route.stub'));
        $Route = preg_replace(array('@ModuleName@'), array(ucfirst($this->ModuleNameStripped)), $Route);
        $this->files->put(base_path('routes/ApiCrudRoutes/' . ucfirst($this->ModuleNameStripped) . '.php'), $Route);

        //Route for Web Stub
        $Route = $this->files->get(app_path('Http/stubs/web_route.stub'));
        $Route = preg_replace(array('@ModuleName@'), array(ucfirst($this->ModuleNameStripped)), $Route);
        $this->files->put(base_path('routes/WebCrudRoutes/' . ucfirst($this->ModuleNameStripped) . '.php'), $Route);

        $this->GenerateCrudRoutes();
        $this->GenerateMigrationTable();
        //Create Menu Item 
        $MenuItem = new Menus();
        $MenuItem->name = ucfirst($this->ModuleName);
        $MenuItem->permission_name = ucfirst($this->ModuleNameStripped);
        $MenuItem->url = ucfirst($this->ModuleNameStripped) . 'Index';
        $MenuItem->icon = $this->ModuleIcon;
        $MenuItem->type = 'module';
        $MenuItem->parent = 0;
        $MenuItem->hierarchy = 0;
        $MenuItem->module_id = $this->ModuleID;
        $MenuItem->save();
        //Create Permission Record
        $NewPermission = new Permission();
        $NewPermission->name = ucfirst($this->ModuleNameStripped);
        $NewPermission->display_name = ucfirst($this->ModuleNameStripped);
        $NewPermission->description = ucfirst($this->ModuleNameStripped) . ' Permission';
        $NewPermission->save();
        $this->AttachPermission($NewPermission);
        Modules::where('id', $this->ModuleID)->update(['status' => 1]);
        $this->composer->dumpAutoloads();
        $this->generateModuleAPIDocumentation();
    }

    /**
     * Create Field Validation Rules
     * @param type $Field
     * @return type
     */
    private function getFieldVailtionRules($Field) {
        $rulesArray = [];
        foreach ($Field->validation_rules as $key => $value) {
            switch ($key) {
                case 'unique':
                    $rulesArray[] = $value . ':' . ucfirst($this->ModuleNameStripped);
                    break;
                case 'type':
                    $rulesArray[] = $value;
                    break;
                default :
                    $rulesArray[] = implode(':', array($key, $value));
                    break;
            }
        }
        return $rulesArray;
    }

    /**
     * Attach Permission for current user's Role
     * @param Permission $permission Permission Object
     */
    protected function AttachPermission($NewPermission) {
        $UserRoles = Auth::user()->roles;
        foreach ($UserRoles as $role) {
            $role->attachPermission($NewPermission);
        }
    }

    /**
     * 
     */
    protected function RemoveFiles() {
        //Remove Contoller Stub
        $this->files->delete(app_path('Http/Controllers/' . ucfirst($this->ModuleNameStripped) . 'Controller.php'));
        //Model Stub 
        $this->files->delete(app_path(ucfirst($this->ModuleNameStripped) . '.php'));
        //Delete View Stub
        $this->files->delete(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_add.blade.php'));
        $this->files->delete(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_edit.blade.php'));
        $this->files->delete(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_view.blade.php'));
        $this->files->delete(resource_path('views/' . ucfirst($this->ModuleNameStripped) . '_list.blade.php'));
        //Remove Web Route Stub
        $this->files->delete(base_path('routes/WebCrudRoutes/' . ucfirst($this->ModuleNameStripped) . '.php'));
        //Remove API  Route Stub
        $this->files->delete(base_path('routes/ApiCrudRoutes/' . ucfirst($this->ModuleNameStripped) . '.php'));
        //Generate Crud Routes File
        $this->composer->dumpAutoloads();
        $this->GenerateCrudRoutes();
        //Drop Table 
        Schema::dropIfExists(ucfirst($this->ModuleNameStripped));
        //Delete Migration Table 
        $this->files->delete(base_path('database/migrations/' . $this->ModuleTableName . '.php'));
    }

    /**
     * Remove Module Menu , make their children parent
     * Delete Module with it's fields
     * Remove Module Migration file
     * Remove Module permissions
     */
    protected function RemvoeModuleRecords($RemoveModule = true) {
        //Deelete Menu Item 
        $DeletedMenuItem = Menus::where('module_id', $this->ModuleID)->get();
        if ($DeletedMenuItem->count() > 0) {
            $DeletedMenuItem = $DeletedMenuItem->first();
            $DeletedMenuItem->delete();
            //Remove Relation between Deleted Items and it's Children (Set Children as Parent)
            Menus::where('parent', $DeletedMenuItem->id)->update(['parent' => 0]);
        }
        Migrations::where('migration', $this->ModuleTableName)->delete();
        Permission::where('name', ucfirst($this->ModuleNameStripped))->delete();
        //Delete Module (in case if delete module)
        if ($RemoveModule) {
            Modules::where('id', $this->ModuleID)->delete();
            ModuleFields::where('module_id', $this->ModuleID)->delete();
            Widgets::where('module_id', $this->ModuleID)->delete();
        }
        $this->removeModuleAPIDocumentation();
    }

    /**
     * Set View HTML
     * @param type $Field
     * @return string
     */
    protected function ViewElementsHTML($Field) {
        $FormItems = '';
        switch ($Field->field_type):
            case 'integer':
            case 'biginteger':
            case 'float':
            case 'boolean':
            case 'date':
            case 'datetime':
            case 'string':
            case 'text':
            case 'select':
                $FormItems .= '<tr>';
                $FormItems .= '<td >' . $Field->field_label . '</td>';
                $FormItems .= '<td><%' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '%></td>';
                $FormItems .= '</tr>';
                break;
            case 'image':
                $FormItems .= '<tr>';
                $FormItems .= '<td >' . $Field->field_label . '</td>';
                $FormItems .= '<td><img ng-src="{{ asset("/files") }}/<%' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '%>" width="200px" /></td>';
                $FormItems .= '</tr>';
                break;
            case 'attachment':
                $FormItems .= '<tr>';
                $FormItems .= '<td >' . $Field->field_label . '</td>';
                $FormItems .= '<td><a target="_new" href="{{ asset("/files") }}/<%' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '%>" >';
                $FormItems .= '<%' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '%>';
                $FormItems .= '</a></td>';
                $FormItems .= '</tr>';
                break;
            case 'one_to_one_relation':
                $FormItems .= '<tr>';
                $FormItems .= '<td >' . $Field->field_label . '</td>';
                $FormItems .= '<td   ng-repeat=" ' . $Field->related_table . 'item in ' . $Field->related_table . '" ng-show="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '==' . $Field->related_table . 'item.' . $Field->related_table_field . '" ><%' . $Field->related_table . 'item.' . $Field->related_table_field_display . '%></td>';
                $FormItems .= '</tr>';
                break;
            case 'radio':
                $FormItems .= '<tr>';
                $FormItems .= '<td >' . $Field->field_label . '</td>';
                $Options = explode(',', $Field->field_options);
                foreach ($Options as $Option):
                    $FormItems .= '<input type="radio" name="' . $Field->module_field_name . '" ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '"  value="' . $Option . '" > ' . $Option . ' ';
                endforeach;
                $FormItems .= '</td></tr>';
                break;
        endswitch;
        return $FormItems;
    }

    protected function FormElementsHTML($Field) {
        $FormItems = '';
        switch ($Field->field_type):
            case 'integer':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="text" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'biginteger':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="number" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'float':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="text" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'boolean':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="' . $Field->field_type . '" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'date':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="text" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="form-control col-md-7 col-xs-12 datepicker" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'datetime':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="text" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="datetimepicker form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'string':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="text" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'text':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<textarea ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '"  id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '" required="required" class="editor form-control col-md-7 col-xs-12" ></textarea>';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'image':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="file" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '"  class="form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'attachment':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<input ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '" type="file" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '"  class="form-control col-md-7 col-xs-12" >';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'one_to_one_relation':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<select  class="form-control col-md-7 col-xs-12" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '"><option ng-selected="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '==' . $Field->related_table . 'item.' . $Field->related_table_field . '" ng-repeat=" ' . $Field->related_table . 'item in ' . $Field->related_table . '" class="form-control col-md-7 col-xs-12" value="<% ' . $Field->related_table . 'item.' . $Field->related_table_field . ' %>" ><% ' . $Field->related_table . 'item.' . $Field->related_table_field_display . ' %></option></select>';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'select':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $FormItems .= '<select  class="form-control col-md-7 col-xs-12" id="' . $Field->module_field_name . '" name="' . $Field->module_field_name . '">';
                $Options = explode(',', $Field->field_options);
                foreach ($Options as $Option):
                    $FormItems .= '<option ng-selected="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '==\'' . $Option . '\'" class="form-control col-md-7 col-xs-12" value="' . $Option . '" >' . $Option . '</option>';
                endforeach;
                $FormItems .= '</select>';
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
            case 'radio':
                $FormItems .= '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="' . $Field->module_field_name . '"> ' . $Field->field_label . ' <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12">';
                $Options = explode(',', $Field->field_options);
                foreach ($Options as $Option):
                    $FormItems .= '<input type="radio" name="' . $Field->module_field_name . '" ng-model="' . ucfirst($this->ModuleNameStripped) . 'Item.' . $Field->module_field_name . '"  value="' . $Option . '" > ' . $Option . ' ';
                endforeach;
                $FormItems .= '<label ng-repeat="error in moduleerrors.errors.' . $Field->module_field_name . '" ng-bind="error" class="error_label"   >';
                $FormItems .= '</div></div>';
                break;
        endswitch;
        return $FormItems;
    }

    protected function GenerateMigrationTable() {
        $Fields_options = '';
        for ($f = 0; $f < count($this->ModuleFields); $f++):
            switch ($this->ModuleFields[$f]->field_type):
                case 'image':
                    $Fields_options .= $this->ModuleFields[$f]->module_field_name . ':string';
                    break;
                case 'attachment':
                    $Fields_options .= $this->ModuleFields[$f]->module_field_name . ':string';
                    break;
                case 'one_to_one_relation':
                    $Fields_options .= $this->ModuleFields[$f]->module_field_name . ':integer';
                    break;
                case 'select':
                    $Fields_options .= $this->ModuleFields[$f]->module_field_name . ':string';
                    break;
                case 'radio':
                    $Fields_options .= $this->ModuleFields[$f]->module_field_name . ':string';
                    break;
                default:
                    $Fields_options .= $this->ModuleFields[$f]->module_field_name . ':' . $this->ModuleFields[$f]->field_type;
                    break;
            endswitch;
            if ($f != count($this->ModuleFields) - 1):$Fields_options .= ',';
            endif;
        endfor;
        $exitCode = Artisan::call('make:tablemigration', [
                    'name' => ucfirst($this->ModuleNameStripped), '--table' => ucfirst($this->ModuleNameStripped), '--fields' => $Fields_options
        ]);
        Modules::where('id', $this->ModuleID)->update(['module_table_name' => Artisan::output()]);
        Artisan::call('migrate', []);
    }

    public function GenerateMigration() {
        $AllData = $request::all();
        $fields_count = count($request::input('field_name'));
        $Fields_options = '';
        for ($f = 0; $f < $fields_count; $f++):
            $Fields[$f]['field_label'] = isset($AllData['field_name'][$f]) ? $AllData['field_name'][$f] : '';
            $Fields[$f]['field_name'] = isset($AllData['field_name'][$f]) ? str_replace(' ', '_', strtolower($AllData['field_name'][$f])) : '';
            $Fields[$f]['field_type'] = isset($AllData['field_type'][$f]) ? str_replace(' ', '_', strtolower($AllData['field_type'][$f])) : '';
            $Fields[$f]['field_length'] = isset($AllData['field_length'][$f]) ? str_replace(' ', '_', strtolower($AllData['field_length'][$f])) : '';
            $Fields[$f]['field_key'] = isset($AllData['field_key'][$f]) ? str_replace(' ', '_', strtolower($AllData['field_key'][$f])) : '';
            $Fields_options .= $Fields[$f]['field_name'] . ':' . $Fields[$f]['field_type'];
            if ($f != $fields_count - 1):$Fields_options .= ',';
            endif;
        endfor;
        //print_r($Fields_options);die();
        $exitCode = Artisan::call('make:tablemigration', [
                    'name' => 'testname', '--table' => 'testname', '--fields' => $Fields_options
        ]);
//            $exitCode = Artisan::call('make:tablemigration', [
//        'name' => 'testone', '--table' => 'testone','--fields'=> 'field_name:string'
//    ]);
    }

    public function ModuleDelete() {

        //Get Table Query Object
        //return $query->orderBy('migration', 'desc')->get();
        $Migrations = Migrations::all();
        print_r($Migrations->toArray());
        die();
        //$migration= 'Tasks';
        //$this->Migrator->runDown((object) $migration, false);
    }

    protected function ModuleResolve($file) {
        $file = implode('_', array_slice(explode('_', $file), 4));
        $class = Str::studly($file);
        return new $class;
    }

    public function GetTableNames() {
        $FinalTables = array();
        $AllTables = DB::select('SHOW TABLES');
        foreach ($AllTables as $tableObject) {
            $DBkey = 'Tables_in_' . strtolower($this->dataBaseName);
            $Table = $tableObject->$DBkey;
            $table_info_columns = DB::select(DB::raw('SHOW COLUMNS FROM `' . $Table . '`'));
            $FinalTables[$Table] = $table_info_columns;
        }
        return $FinalTables;
    }

    /**
     * Check if Migration Class exists . 
     * @param type $MigrationClass
     * @return boolean
     */
    public function CheckMigrationClass($MigrationClass) {
        if (Schema::hasTable($MigrationClass)) {
            return true;
        } else {
            return false;
        }
    }

    public function GeneratePDF() {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        @$dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    /**
     * Generate Module API Documentation
     */
    private function generateModuleAPIDocumentation() {
        $values = [
            ['url'=>'api/ModuleName/','method_type'=>'GET','parameters'=>[],'description'=>''],
            ['url'=>'api/ModuleName/list','method_type'=>'GET','parameters'=>[],'description'=>''],
            ['url'=>'api/ModuleName/create_or_update','method_type'=>'POST','parameters'=>[],'description'=>''],
            ['url'=>'api/ModuleName/add','method_type'=>'GET','parameters'=>[],'description'=>''],
            ['url'=>'api/ModuleName/edit/{id}','method_type'=>'GET','parameters'=>['id'],'description'=>''],
            ['url'=>'api/ModuleName/view/{id}','method_type'=>'GET','parameters'=>['id'],'description'=>''],
            ['url'=>'api/ModuleName/update/{id}','method_type'=>'POST','parameters'=>['id'],'description'=>''],
            ['url'=>'api/ModuleName/delete/{id}','method_type'=>'GET','parameters'=>['id'],'description'=>''],
            ['url'=>'api/ModuleName/delete_multiple','method_type'=>'DELETE','parameters'=>[],'description'=>''],
        ];
        $moduleName = ucfirst($this->ModuleNameStripped);
        foreach($values as $value){    
            $api_documentation = new \App\ApiDocumentation();
            $api_documentation->url= preg_replace('/ModuleName/', $moduleName, $value['url']);
            $api_documentation->method_type=$value['method_type'];
            $api_documentation->parameters = json_encode($value['parameters']);
            $api_documentation->description = $value['description'];
            $api_documentation->save();
        }
    }

    /**
     * Remove Module API Documentation 
     * from documentation List
     */
    private function removeModuleAPIDocumentation() {
        $moduleName = ucfirst($this->ModuleNameStripped);
        return ApiDocumentation::where('url', 'like', "%api/{$moduleName}%")
                ->delete();
    }

    public function getFormBuilder() {
        return view('formbuilder');
    }

}
