<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use Modules\Blog\Entities\BlogCategories;
use Modules\Blog\Entities\Blog;

class SiteController extends Controller
{
    public $Now;
    public $Response;
    public function __construct(){
        parent::__construct();
        $this->Now      =   date('Y-m-d H:i:s');
        $this->Response =   new ResponseController();
    }
    
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return View('frontEndTemplates.creative.home');
    }
    
    /**
     * Display a listing of categories .
     * @return \Illuminate\Http\Response
     */
    public function blogCategories()
    {
        $blogCategories = BlogCategories::where('status',1)->paginate(10);
        return View('frontEndTemplates.creative.blog_categories',['blogCategories'=>$blogCategories]);
    }
    
     /**
     * Display a blog category .
     * @return \Illuminate\Http\Response
     */
    public function blogCategory($categoryID)
    {
        $blogs = Blog::where(['status'=>1,'category'=>$categoryID])
                ->paginate(10);
        return View('frontEndTemplates.creative.blogs',
                ['blogs'=>$blogs]);
    }
    
     /**
     * Display a blog .
     * @return \Illuminate\Http\Response
     */
    public function blogs()
    {
        $blogs = Blog::with('category')->where(['status'=>1])
                ->paginate(10);
        return View('frontEndTemplates.creative.blogs',
                ['blogs'=>$blogs]);
    }
    
     /**
     * Display a blog .
     * @return \Illuminate\Http\Response
     */
    public function singleBlog($blogID)
    {
        $blog = Blog::where(['status'=>1,'id'=>$blogID])
                ->first();
        return View('frontEndTemplates.creative.blog',
                ['blog'=>$blog]);
    }
    
}
