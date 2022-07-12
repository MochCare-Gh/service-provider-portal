<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoices;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;
use App\Invoicedetails;
use Artisan;
use Illuminate\Support\Facades\Route;

class InvoicesController extends Controller {

    public $Now;
    public $Response;

    public function __construct() {
        parent::__construct();
        $this->Now = date('Y-m-d H:i:s');
        $this->Response = new ResponseController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return View('Invoices');
    }

    /**
     * 
     * @return type 
     */
    public function All() {
        $Invoices = Invoices::query();

        return Datatables::of($Invoices)->addColumn('Select', function($Invoices) {
                            return '<input class="flat Invoices_record" name="Invoices_record"  type="checkbox" value="' . $Invoices->id . '" />';
                        })
                        ->addColumn('actions', function ($Invoices) {
                            $column = '<a href="' . route('Invoices_invoice_details', $Invoices->id) . '"   class="edit '.config('view.view_classes')['button'].'"><i class="'.config('view.view_classes')['icon'].'"></i> View</a>';
                            $column .= '<a href="javascript:void(0)"  data-url="' . route('Invoicesedit', $Invoices->id) . '" class="edit '.config('view.edit_classes')['button'].'"><i class="'.config('view.edit_classes')['icon'].'"></i> Edit</a>';
                            $column .= '<a href="javascript:void(0)" data-url="' . route('Invoicesdelete', $Invoices->id) . '" class="delete '.config('view.delete_classes')['button'].'"><i class="'.config('view.delete_classes')['icon'].'"></i> Delete</a>';
                            return $column;
                        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request) {
        try {
            //dd($request->all());

            if ($request['id'] != ''):
                Invoicedetails::where('invoice_id', $request['id'])->delete();
                $Invoices = Invoices::where('id', $request['id'])->first();
                $Invoices->from_company_name = strip_tags($request["from_company_name"]);
                $Invoices->from_company_address = $request["from_company_address"];
                $Invoices->from_company_phone = strip_tags($request["from_company_phone"]);
                $Invoices->from_company_email = strip_tags($request["from_company_email"]);
                $Invoices->to_company_name = strip_tags($request["to_company_name"]);
                $Invoices->to_company_address = $request["to_company_address"];
                $Invoices->to_company_phone = strip_tags($request["to_company_phone"]);
                $Invoices->to_company_email = strip_tags($request["to_company_email"]);
                $Invoices->invoice_number = strip_tags($request["invoice_number"]);
                $Invoices->payment_due = strip_tags($request["payment_due"]);
                $Invoices->tax = strip_tags($request["tax"]);
                $Invoices->shipping = strip_tags($request["shipping"]);
                $Invoices->total = strip_tags($request["total"]);
                $Invoices->payment_status = strip_tags($request["payment_status"]);
                $Invoices->invoice_type = strip_tags($request["invoice_type"]);
                $Invoices->renewal_date = strip_tags($request["renewal_date"]);
                $Invoices->save();
                $itemDetails = [];
                foreach ($request->ItemDetail as $ItemDetail) {
                    array_push($itemDetails, new Invoicedetails([
                                "quantity" => $ItemDetail['quantity'],
                                "product" => $ItemDetail['product'],
                                "description" => $ItemDetail['description'],
                                "subtotal" => $ItemDetail['subtotal'],
                                "invoice_id" => $Invoices['id']
                    ]));
                }
                if (!empty($itemDetails)) {
                    $Invoices->details()->saveMany($itemDetails);
                }
                return $this->Response->prepareResult(200, $Invoices, [], 'Invoices Saved successfully ', 'ajax');
            else:
                $Invoices = new Invoices();
                $Invoices->from_company_name = strip_tags($request["from_company_name"]);
                $Invoices->from_company_address = $request["from_company_address"];
                $Invoices->from_company_phone = strip_tags($request["from_company_phone"]);
                $Invoices->from_company_email = strip_tags($request["from_company_email"]);
                $Invoices->to_company_name = strip_tags($request["to_company_name"]);
                $Invoices->to_company_address = $request["to_company_address"];
                $Invoices->to_company_phone = strip_tags($request["to_company_phone"]);
                $Invoices->to_company_email = strip_tags($request["to_company_email"]);
                $Invoices->invoice_number = strip_tags($request["invoice_number"]);
                $Invoices->payment_due = strip_tags($request["payment_due"]);
                $Invoices->tax = strip_tags($request["tax"]);
                $Invoices->shipping = strip_tags($request["shipping"]);
                $Invoices->total = strip_tags($request["total"]);
                $Invoices->payment_status = strip_tags($request["payment_status"]);
                $Invoices->invoice_type = strip_tags($request["invoice_type"]);
                $Invoices->renewal_date = strip_tags($request["renewal_date"]);
                $Invoices->save();
                $itemDetails = [];
                foreach ($request->ItemDetail as $ItemDetail) {
                    array_push($itemDetails, new Invoicedetails([
                                "quantity" => $ItemDetail['quantity'],
                                "product" => $ItemDetail['product'],
                                "description" => $ItemDetail['description'],
                                "subtotal" => $ItemDetail['subtotal'],
                                "invoice_id" => $Invoices['id']
                    ]));
                }
                if (!empty($itemDetails)) {
                    $Invoices->details()->saveMany($itemDetails);
                }
                return $this->Response->prepareResult(200, $Invoices, [], 'Invoices Created successfully ', 'ajax');
            endif;
        } catch (Exception $exc) {
            return $this->Response->prepareResult(400, null, [], null, 'ajax', 'Invoices Could not be  Saved');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function edit($ID) {
        try {
            $data = Invoices::with('details')->where('id', $ID)->get();
            return $this->Response->prepareResult(200, $data, [], null, 'ajax');
        } catch (\Exception $exc) {
            return $this->Response->prepareResult(400, [], null, 'ajax', 'Could not get This item');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function Delete($ID) {
        try {
            Invoicedetails::where('invoice_id', $ID)->delete();
            Invoices::where('id', $ID)->delete();
            return $this->Response->prepareResult(200, [], 'Invoices Item deleted Successfully', 'ajax');
        } catch (\Exception $exc) {
            
        } return $this->Response->prepareResult(400, [], null, 'ajax', 'Invoices Item Could be not deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function DeleteMultiple(Request $request) {
        try {
            Invoices::whereIn('id', $request->selected_rows)->delete();
            return $this->Response->prepareResult(200, [], 'Invoices Item/s deleted Successfully', 'ajax');
        } catch (\Exception $exc) {
            
        } return $this->Response->prepareResult(400, [], null, 'ajax', 'Invoices Item/s Could be not deleted');
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

    public function invoiceDetails($invoiceID) {
        $invoice = Invoices::with('details')->where('id', $invoiceID)->first();
        return view('Invoice_details', ['invoice' => $invoice]);
    }

}
