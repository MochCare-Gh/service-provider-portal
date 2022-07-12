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
use Datatables;
use App\ModuleFields;
use Illuminate\Filesystem\Filesystem;
use Auth;
use Illuminate\Support\Composer;
use App\Menus;
use App\Migrations;
use App\User;
use Hash;
use Laravel\Passport\Console\InstallCommand;

Class InstallController extends Controller {

    protected $files;
    private $dataBaseName;
    protected $ModuleID;
    protected $ModuleName;
    protected $ModuleNameStripped;
    protected $ModuleTableName;
    protected $ModuleIcon;
    protected $ModuleFields;
    protected $composer;

    public function __construct(Filesystem $files, Composer $composer) {

        $this->composer = $composer;
        $this->files = $files;
        $this->dataBaseName = DB::connection()->getDatabaseName();
    }

    public function index() {
        // Artisan::call('clear-compiled');
//    	Artisan::call('config:clear');
//    	Artisan::call('cache:clear');
        //  	Artisan::call('key:generate');

        return view('install/index');
    }

    public function InstallProcess(Request $request) {

        $ValidateInstall = $this->ValidateInstall($request);
        if ($ValidateInstall->fails()):
            return response()->json($ValidateInstall->errors(), 404);
        else:
            Artisan::call('config:clear');
            Artisan::call('key:generate', ['--show' => true]);
            $Key = Artisan::output();
            $Env = $this->files->get(app_path('Http/stubs/') . '.env.stub');
            $Env = preg_replace(array('@SomeRandomString@', '@{DataBaseHost}@', '@{DataBaseName}@', '@{DataBaseUserName}@', '@{DataBasePassWword}@'), array($Key, $request['db_host'], $request['db_name'], $request['db_username'], $request['db_password']), $Env);
            $this->files->put(base_path('.env'), $Env);
        endif;
    }

    public function InstallStepTwo() {
        return view('install/InstallMigration');
    }

    public function InstallMigration(Request $request) {
        Artisan::call('migrate', []);
        //Migrate passport tables 
        Artisan::call('migrate', ['--path' => 'vendor/laravel/passport/database/migrations']);
        Artisan::call('db:seed');

        //Create Admin User
        $User = new User();
        $User->name = $request['username'];
        $User->email = $request['email'];
        $User->password = Hash::make($request['password']);
        $User->image = 'img.jpg';
        $User->save();
        $User->roles()->sync(array($request['roles']));
        Artisan::call('passport:install');
    }

    public function ValidateInstall(Request $request) {

        return Validator::make($request->all(), ['db_host' => 'required|max:255', 'db_name' => 'required|max:255', 'db_username' => 'required|max:255', 'db_password' => 'required|max:255']);
    }

}
