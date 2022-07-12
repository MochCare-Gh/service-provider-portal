<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Books;
use Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class FacebookController extends Controller
{
    
    public $Now;
    
    public function __construct(){
        parent::__construct();
        $this->Now=date('Y-m-d H:i:s');
    }
    public function RequestFacebookToken(){ 
        
    }
    public function facebookTest(){
        $client = new \GuzzleHttp\Client();
        $result = $client->request('POST','https://graph.facebook.com/v2.11/me', [
            'form_params' => ['sample-form-data' => 'value'],
            'headers'        => ['access_token' => '953032921490523|RUZ4vfIOErpgUOmMDvDCTcP3HMA'],
        ]);
    //    953032921490523|RUZ4vfIOErpgUOmMDvDCTcP3HMA
    }

}
