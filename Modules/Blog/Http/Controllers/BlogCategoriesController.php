<?php
namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Modules\Blog\Entities\BlogCategories;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class BlogCategoriesController extends Controller
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
        return View('blog::Blog_categories_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Blog_categories=BlogCategories::query();
        
        return Datatables::of($Blog_categories)->addColumn('Select', function($Blog_categories) { return '<input class="flat Blog_categories_record" name="Blog_categories_record"  type="checkbox" value="'.$Blog_categories->id.'" />';})
                ->addColumn('actions', function ($Blog_categories) {
                    $column='<a href="'.route('Blog_categoriesview',$Blog_categories->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                    $column.='<a href="'.route('Blog_categoriesedit',$Blog_categories->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                    $column.='<a href="javascript:void(0)" data-url="'.route('Blog_categoriesdelete',$Blog_categories->id).'" class=" delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                    return $column;
                })
                ->editColumn('status',function($Blog_categories){
                   return trans('blog::blog_categories.status_'.$Blog_categories->status);     
                })->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        return Validator::make($request->all(), array (
            'category_name' => array (0 => 'min:1',1 => 'max:199',2 => 'string'),
            'status' =>array (0 => 'integer'),
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Blog category Could not be  Saved');
            }
            if($request['id'] !=''):
                $Blog_categories = BlogCategories::where('id',$request['id'])->first();    
                $Blog_categories->category_name=strip_tags($request["category_name"]);$Blog_categories->status=strip_tags($request["status"]);
                $Blog_categories->save();
                return $this->Response->prepareResult(200,$Blog_categories,[],'Blog category Saved successfully ','ajax');
            else:
                $Blog_categories=new BlogCategories();    
                $Blog_categories->category_name=strip_tags($request["category_name"]);$Blog_categories->status=strip_tags($request["status"]);
                $Blog_categories->save();
                return $this->Response->prepareResult(200,$Blog_categories,[],'Blog category Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Blog category Could not be  Saved');
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
                $data=BlogCategories::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','blog::Blog_categories_view');
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
                $data=BlogCategories::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','blog::Blog_categories_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','blog::Blog_categories_add');
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
                BlogCategories::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Blog_categories Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Blog_categories Item Could be not deleted');
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
                BlogCategories::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Blog_categories Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Blog_categories Item/s Could be not deleted');
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
