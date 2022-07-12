<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoicedetails;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class InvoicedetailsController extends Controller
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
        return View('Invoicedetails');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Invoicedetails=Invoicedetails::query();
        $Invoicedetails=$Invoicedetails->with('invoice_id');
        return Datatables::of($Invoicedetails)->addColumn('Select', function($Invoicedetails) { return '<input class="flat Invoicedetails_record" name="Invoicedetails_record"  type="checkbox" value="'.$Invoicedetails->id.'" />';})
                ->addColumn('actions', function ($Invoicedetails) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Invoicedetailsedit',$Invoicedetails->id).'" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Invoicedetailsdelete',$Invoicedetails->id).'" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
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
                $Invoicedetails = Invoicedetails::where('id',$request['id'])->first();    
                $Invoicedetails->quantity=strip_tags($request["quantity"]);$Invoicedetails->product=strip_tags($request["product"]);$Invoicedetails->description=$request["description"];$Invoicedetails->subtotal=strip_tags($request["subtotal"]);$Invoicedetails->invoice_id=$request["invoice_id"];
                $Invoicedetails->save();
                return $this->Response->prepareResult(200,$Invoicedetails,[],'Invoicedetails Saved successfully ','ajax');
            else:
                $Invoicedetails=new Invoicedetails();    
                $Invoicedetails->quantity=strip_tags($request["quantity"]);$Invoicedetails->product=strip_tags($request["product"]);$Invoicedetails->description=$request["description"];$Invoicedetails->subtotal=strip_tags($request["subtotal"]);$Invoicedetails->invoice_id=$request["invoice_id"];
                $Invoicedetails->save();
                return $this->Response->prepareResult(200,$Invoicedetails,[],'Invoicedetails Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Invoicedetails Could not be  Saved');
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
                $data=Invoicedetails::where('id',$ID)->get();
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
                Invoicedetails::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Invoicedetails Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Invoicedetails Item Could be not deleted');
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
                Invoicedetails::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Invoicedetails Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Invoicedetails Item/s Could be not deleted');
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
