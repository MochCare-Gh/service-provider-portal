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
use Storage;
use Validator;
use Illuminate\Support\Facades\File;
use config;
use App\Settings;
use Socialite;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\MessageBag;
use App\Http\Resources\User as UserResource;

Class UsersController extends Controller
{

    public $Now;
    protected $cookieFactory;
    protected $Response;
    public function __construct()
    {
        parent::__construct();
        $this->Response=new ResponseController();
        $this->Now = date('Y-m-d H:i:s');
    }
    
    /**
     * show Login page
     * @return VIEW
     */
    public function Login()
    {
        if(Auth::user()){
            return $this->Response->prepareResult(true,[],[],[],'redirect',route('dashboardIndex')); 
        }
        return $this->Response->prepareResult(200,[],[],[],'view','auth.login');
    }
    /**
     * Validate User
     * @param \Illuminate\Http\Request $request
     * @return Validator object
     */
    protected function ValidateAuth(Request $request)
    {
        return Validator::make($request->all(), ['login_email' => 'required|email','login_password' => 'required']);
    }
    /**
     * Authenticate User
     * @param \Illuminate\Http\Request $request
     * @return JSON
     */
    public function auth(Request $request)
    {
        $ValidateAuth=$this->ValidateAuth($request);
        if($ValidateAuth->fails())
        { 
            return $this->Response->prepareResult(400, [], $ValidateAuth, '', 'redirect', route('login'));
        }
        if(Auth::attempt(['email' => $request->input('login_email'), 'password' => $request->input('login_password')])) {
            $UserInfo = User::where('email', $request->input('login_email'))->first();
            $UserInfo->token =$UserInfo->createToken('appbuilder_token')->accessToken;
            Session::put('name', $UserInfo->name);            
            return $this->Response->prepareResult(200, new UserResource($UserInfo), [], '', 'redirect', route('dashboardIndex'));
        } else {
            return $this->Response->prepareResult(400, [], [], '', 'redirect', route('login'));
        }
    }
    
    /**
     * Log user out
     * @return redirect
     */
    public function Logout()
    {
        try {
            Auth::logout();
            Session::forget('email');
            return $this->Response->prepareResult(200, [], [], '', 'redirect', route('login'));
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [], '', 'redirect', route('login'));
        }
    }
    
    /**
     * Register view
     * @return view
     */
    public function register()
    {
        return $this->Response->prepareResult(200, [], [], '', 'view', 'auth.register');
    }
    protected function ValidateRegister(Request $request)
    {
        return Validator::make($request->all(), ['first_name'=>'required','last_name'=>'required','email' => 'required|email|unique:users','password' => 'required']);
    }
    
    /**
     * Register new User
     * @param \Illuminate\Http\Request $request
     * @return type
     */
    public function RegisterPost(Request $request)
    {
        try {
            $settings=  Settings::where('id',1)->first();
            if($settings->registration){
                $ValidateRegister=$this->ValidateRegister($request);
                if($ValidateRegister->fails())
                {
                    return $this->Response->prepareResult(400, [], $ValidateRegister,'','redirect',route('login').'#toregister');
                }
                $user = new User();
                $user->name=$request->input('first_name').' '.$request->input('last_name'); ;
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                if ($request->file('image')){
                    $User->image = $this->UploadProfilePic($request);
                }
                else{
                    $user->image = 'photos/img.jpg';
                }
                $user->image = 'photos/img.jpg';
                $user->save();
                $user->roles()->sync(array(2));
                return $this->Response->prepareResult(200, [], [],'','redirect',route('login'));
                }
        } catch (\Exception $exc) {
                return $this->Response->prepareResult(400, [], [],'','redirect',route('login'));
        }
    }
    
    /**
     * Register Users as admin
     */
    public function RegisterUserToAdmin()
    {
        $Users=User::select('id')->get();
        foreach($Users as $User):
            $User=User::where('id',$User->id)->first();
            $User->roles()->sync(array(2));
        endforeach;
    }
    
    /**
     * Show all users
     * @return view
     */
    public function Index()
    {        
         try {
             $Roles = Role::all();
             return $this->Response->prepareResult(200, ['roles' => $Roles], [],'','view','users/users');
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [],'');
        }
    }
    
    /**
     * Get All Users
     * @return JSON
     */
    public function All()
    {
        $Users = User::with('roles')->get();
        return Datatables::of($Users)->addColumn('Select', function($Users) { return '<input class="flat user_record" name="user_record"  type="checkbox" value="'.$Users->id.'" />';})
                ->addColumn('actions', function ($Users) {
                $User=Auth::user();    
                $column='';
                if($User->can('user_edit')){
                    $column .= '<a href="javascript:void(0)"  data-url="' . route('usersedit', $Users->id) . '" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';  
                }
                if($User->can('user_delete')){
                    $column .= '<a href="javascript:void(0)" data-url="' . route('usersdelete', $Users->id) . '" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                }
                return $column;
            })->addColumn('role', function ($Users) {
                $column='';
                foreach ($Users->Roles as $role){
                    $column.='<span class="badge bg-green">'.$role->name.'</span>';
                }
                return $column;
            })->rawColumns(['Select','role','actions'])->make(true);
    }
    
    /**
     * Get User ByID
     * @param type $ID
     * @return JSON
     */
    public function Edit($ID)
    {
        try {
            $data=User::with('Roles')->where('id', $ID)->get();
            return $this->Response->prepareResult(200, $data, [],'');
        } catch (\Exception $exc) {
            
        }

    }

    /**
     * Create User or update it 
     * @param \Illuminate\Http\Request $request
     * @return JSON
     */
    public function CreateOrUpdate(Request $request)
    {
        try {
            $All_input = $request->input();
            if ($request['id'] != ''):
                $User = User::where('id', $All_input['id'])->first();
                $User->name = $All_input['name'];
                $User->email = $All_input['email'];
                if ($All_input['password'] != ''):
                    $User->password = Hash::make($All_input['password']);
                endif;
                if ($request->file('image')):
                    $User->image = $this->UploadProfilePic($request);
                endif;
                $User->save();
            else:
                $User = new User();
                $User->name = $All_input['name'];
                $User->email = $All_input['email'];
                $User->password = Hash::make($All_input['password']);
                $User->image = 'photos/img.jpg';
                $User->save();
            endif;
            $User->roles()->sync(array($All_input['roles']));
            return $this->Response->prepareResult(200, $User, [], 'User Saved Successfully !');
        } catch (\Exception $exc) {
            dd($exc);
            return $this->Response->prepareResult(400, [], [], 'Could not save user data !');
        }
    }
    
    /**
     * Delete User
     * @param type $ID
     * @return JSON
     */
    public function Delete($ID)
    {
        try {
            if(config('sysconfig.users.delete')){
                User::where('id', $ID)->delete();
                return $this->Response->prepareResult(200, [], [], 'User deleted successfully');
            }
            else{
                return $this->Response->prepareResult(400, [], [], 'Could not Delete User in Demo Version');            
            }   
        } catch (\Exception $exc) {
                return $this->Response->prepareResult(400, [], [], 'Could not Delete User in Demo Version');            
        }        
    }

    
    /**
     * Delete Multiple Users
     * @param Request $request
     * @return JSON
     */
    public function DeleteMultiple(Request $request)
    {
        try {
            if(config('sysconfig.users.delete')){
                User::whereIn('id', $request->selected_rows)->delete();
                return $this->Response->prepareResult(200, [], [], 'User/s deleted successfully');
            }
            else{
                return $this->Response->prepareResult(400, [], [], 'Could not Delete User/s in Demo Version');            
            }   
        } catch (\Exception $exc) {
                return $this->Response->prepareResult(400, [], [], 'Could not Delete User/s in Demo Version');            
        }        
    }
    
    /**
     * User profile
     * @return view
     */
    public function Profile()
    {
        try {
            $User = Auth::user();
            return $this->Response->prepareResult(200,['user' => $User],[],[],'view','users.profile');
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [], []);
        }
    }
    
    /**
     * Update User profile
     * @param \Illuminate\Http\Request $request
     * @return JSON/REDIRECT
     */
    public function ProfileUpdate(Request $request)
    {
        try {
                $All_input = $request->input();
                $User = User::where('id', Auth::user()->id)->first();
                $User->name = $All_input['name'];
                $User->email = $All_input['email'];
                if ($All_input['password'] != ''):
                    $User->password = Hash::make($All_input['password']);
                endif;
                if ($request->file('image')):
                    $User->image = $this->UploadProfilePic($request);
                endif;
                $User->save();
            return $this->Response->prepareResult(200, $User, [], 'User profile updated successfully', 'redirect', route('userprofile'));
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [], 'Could not update user profile', 'redirect', route('userprofile'));
        }        
    }
    
    /**
     * Upload profile picture
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    protected function UploadProfilePic(Request $request)
    {
        $Image = $request->file('image');
        $Extension = $Image->getClientOriginalExtension();
        $path = $Image->getFilename() . '.' . $Extension;
        Storage::disk('public_folder')->put($path, File::get($request->file('image')));
        return $path;
    }
    
    /**
     * privacy policy URL for 
     * social login purposes
     * @return view
     */
    public function privacyPolicy(){
        return view('privacyPolicy');
    }
    
    /**
     * Redirect to facebook provider
     * @return redirect
     */
    public function redirectToFacebookProvider(){
        return Socialite::driver('facebook')->redirect();
    }
    
    /**
     * Get User Social Details and log him in
     * @return type
     */
    public function handleFacebookCallback(){
         $User = Socialite::driver('facebook')->user();
         return $this->loginSocailUsers($User);
    }
    
    
    /**
     * Redirect to google provider
     * @return redirect
     */
    public function redirectToGoogleProvider(){
        return Socialite::driver('google')->redirect();
    }
    
    /**
     * Get User Social details and log him in
     * @return redirect
     */
    public function handleGoogleCallback(){
         $User = Socialite::driver('google')->user();
         return $this->loginSocailUsers($User);
    }
    
    /**
     * Redirect to twitter provider
     * @return redirect
     */
    public function redirectToTwitterProvider(){
        return Socialite::driver('twitter')->redirect();
    }
    
    /**
     * Get User Social details and log him in
     * @return redirect
     */
    public function handleTwitterCallback(){
         $User = Socialite::driver('twitter')->user();
         return $this->loginSocailUsers($User);
    }
    
    /**
     * Log User by his social details
     * @param type $User
     * @return redirect
     */
    public function loginSocailUsers($User){
        try {
            $Mail=$User->getEmail();
            $IsUser=User::where('email',$Mail)->get();
            if($IsUser->count()>0){
                $User=$IsUser->first();
                Auth::login($User);
            }
            else{
                //Create account for Him
                $NewUser= new User();
                $NewUser->name  =   $User->getName();
                $NewUser->email =   $User->getEmail();
                $NewUser->image =   $User->getAvatar();
                $NewUser->save();
                $NewUser->roles()->sync(array(1));
                Auth::login($NewUser);
            }
            return $this->Response->prepareResult(200, [], [], 'User logged in', 'redirect', route('dashboardIndex'));
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], [], 'Could not log user in', 'redirect', route('dashboardIndex'));
        }
    }
}

?>
