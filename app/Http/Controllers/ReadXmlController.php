<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadXmlController extends Controller
{
     public function index()
    {
        // $xmlDataString = file_get_contents('file:///C:/Users/ghan5/Downloads/offbeatstaysinindia-offbeatstays.WordPress.2021-05-22.xml');
        $xmlDataString = file_get_contents('file:///C:/Users/ghan5/Downloads/offbeatstaysinindia-offbeatstays.WordPress.2021-05-23 (1).xml');
        $xmlObject = simplexml_load_string($xmlDataString);
                   
        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true); 
   
        // echo "<pre>";
        // print_r($phpDataArray);
        dd($phpDataArray);
    }
}
