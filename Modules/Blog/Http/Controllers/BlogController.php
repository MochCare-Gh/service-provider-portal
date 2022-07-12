<?php
namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Blog\Entities\Blog;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;
use Illuminate\Validation\Rule;

class BlogController extends Controller
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
        return View('blog::Blog_list');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Blog=Blog::query();
        $Blog=$Blog->with('category');
        return Datatables::of($Blog)->addColumn('Select', function($Blog) { return '<input class="flat Blog_record" name="Blog_record"  type="checkbox" value="'.$Blog->id.'" />';})
                ->addColumn('actions', function ($Blog) {
                    $column='<a href="'.route('Blogview',$Blog->id).'"  class="'.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                    $column.='<a href="'.route('Blogedit',$Blog->id).'"  class="'.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                    $column.='<a href="javascript:void(0)" data-url="'.route('Blogdelete',$Blog->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                    return $column;
                })
                ->editColumn('status',function($Blog){
                    return ($Blog->status==1)?'Published':'draft';
                })
                ->editColumn('image',function($Blog){ return "<img  width='70' class='img-circle img-responsive' src='files/".$Blog->image."' />";})->make(true);
    }

    private function validateCreateOrUpdate(Request $request){
        $imageRules='';
        if($request->hasFile('image')){
            $imageRules='image';
        }
        return Validator::make($request->all(), array (
        'title' =>array ('min:1','max:255','string'),
        'content' => array(),
        'meta_tags' => array(),
        'meta_description' => array(),
        'slug' => array('min:1','max:199', Rule::unique('Blog')->ignore($request->id, 'id')),
        'excerpt' => array(),
        'category' => array(),
        'tags' => array(),
         'author_name' => array(),
        'status' =>array('string'),
        'image' =>array($imageRules),
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
                return $this->Response->prepareResult(400,null,$validationResult->errors(),null,'ajax',null,'Blog Could not be  Saved');
            }
            if($request['id'] !=''):
                $Blog = Blog::where('id',$request['id'])->first();    
                $Blog->title=strip_tags($request["title"]);
                $Blog->content=$request["content"];
                $Blog->meta_tags=strip_tags($request["meta_tags"]);
                $Blog->meta_description=$request["meta_description"];
                $Blog->slug=strip_tags($request["slug"]);
                $Blog->excerpt=$request["excerpt"];
                $Blog->category=$request["category"];
                $Blog->tags=strip_tags($request["tags"]);
                $Blog->author_name=strip_tags($request["author_name"]);
                $Blog->status=strip_tags($request["status"]);
                $ImagePath=$this->Upload($request,"image");
                $Blog->image=$ImagePath;
                $Blog->save();
                return $this->Response->prepareResult(200,$Blog,[],'Blog Saved successfully ','ajax');
            else:
                $Blog=new Blog();    
                $Blog->title=strip_tags($request["title"]);
                $Blog->content=$request["content"];
                $Blog->meta_tags=strip_tags($request["meta_tags"]);
                $Blog->meta_description=$request["meta_description"];
                $Blog->slug=strip_tags($request["slug"]);
                $Blog->excerpt=$request["excerpt"];
                $Blog->category=$request["category"];
                $Blog->tags=strip_tags($request["tags"]);
                $Blog->author_name=strip_tags($request["author_name"]);
                $Blog->status=strip_tags($request["status"]);
                $ImagePath=$this->Upload($request,"image");
                $Blog->image=$ImagePath;
                $Blog->save();
                return $this->Response->prepareResult(200,$Blog,[],'Blog Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Blog Could not be  Saved');
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
                $data=Blog::where('id',$ID)->firstOrFail();        
                return $this->Response->prepareResult(200,$data,[],null,'view','blog::Blog_view');
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
                $data=Blog::where('id',$ID)->firstOrFail();                
                return $this->Response->prepareResult(200,$data,[],null,'view','blog::Blog_edit');
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
                return $this->Response->prepareResult(200,$data,[],null,'view','blog::Blog_add');
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
                Blog::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Blog Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Blog Item Could be not deleted');
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
                Blog::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Blog Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Blog Item/s Could be not deleted');
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
