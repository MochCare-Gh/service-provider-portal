<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Settings;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;
use Illuminate\Filesystem\Filesystem;

class GeneralSettingsController extends Controller {

    public $Now;
    public $Response;

    public function __construct() {
        parent::__construct();
        $this->Now = date('Y-m-d H:i:s');
        $this->files = new Filesystem();
        $this->Response = new ResponseController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $Settings = Settings::where('id', 1)->get()->toJson();
        return $this->Response->prepareResult(200, ['Settings' => $Settings], [], [], 'view', 'generalsettings.Settings');
    }

    /**
     * 
     * @return type 
     */
    public function All() {
        $Settings = Settings::query();

        return Datatables::of($Settings)->addColumn('actions', function ($Settings) {
                    $column = '<a href="javascript:void(0)"  data-url="' . route('Settingsedit', $Settings->id) . '" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                    $column .= '<a href="javascript:void(0)" data-url="' . route('Settingsdelete', $Settings->id) . '" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                    return $column;
                })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request) {
        if ($request['id'] != ''):
            $Settings = Settings::where('id', $request['id'])->first();
            $Settings->registration = strip_tags($request["registration"]);
            $Settings->crudbuilder = strip_tags($request["crudbuilder"]);
            $Settings->filemanager = strip_tags($request["filemanager"]);
            //Save Settings RTL
            $Env = $this->files->get(base_path('/.env'));
            $Env = preg_replace(array('@REGISTRATION=[a-zA-Z]{4,5}@'), array('REGISTRATION=' . strip_tags($request["registration"])), $Env);
            $Env = preg_replace(array('@CRUDBUILDER=[a-zA-Z]{4,5}@'), array('CRUDBUILDER=' . strip_tags($request["crudbuilder"])), $Env);
            $Env = preg_replace(array('@FILEMANAGER=[a-zA-Z]{4,5}@'), array('FILEMANAGER=' . strip_tags($request["filemanager"])), $Env);
            $Env = preg_replace(array('@DIRECTION=[a-zA-Z]{3}@'), array('DIRECTION=' . strip_tags($request["direction"])), $Env);
            $Env = preg_replace(array('@locale=[a-zA-Z]{2}@'), array('locale=' . strip_tags($request["locale"])), $Env);
            $Env = preg_replace(array('@theme=[a-zA-Z_]{1,}@'), array('theme=' . $request["theme"]), $Env);
            $this->files->put(base_path('/.env'), $Env);
            $Settings->save();
        else:
            $Settings = new Settings();
            $Settings->registration = strip_tags($request["registration"]);
            $Settings->crudbuilder = strip_tags($request["crudbuilder"]);
            $Settings->filemanager = strip_tags($request["filemanager"]);
            $Settings->save();
        endif;
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function edit($ID) {
        try {
            $data = Settings::where('id', $ID)->get();
            return $this->Response->prepareResult(200, $data, [], '');
        } catch (\Exception $exc) {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function Delete($ID) {
        Settings::where('id', $ID)->delete();
    }

    /**
     * Upload Attachment Or Image
     */
    protected function Upload(Request $request, $FieldName) {
        $path = '';
        $Image = $request->file($FieldName);
        if ($Image):
            $Extension = $Image->getClientOriginalExtension();
            $path = $Image->getFilename() . '.' . $Extension;
            Storage::disk('files_folder')->put($path, File::get($request->file($FieldName)));
        endif;
        return $path;
    }

}
