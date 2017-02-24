<?php

namespace App\Http\Controllers;

class PoshtaController extends Controller
{

    //http://testapi.novaposhta.ua/v2.0/json/Address/getCities
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }


    public function getCities(){
        $data = [];
        $data['modelName'] = "Address";
        $data['calledMethod'] = "getCities";
        $data['apiKey'] = "7b3ba8d550fd65246f87854ff134893a";
        $data['methodProperties']['Ref'] = '';
        $dataJson = json_encode($data);

        // create curl resource
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://testapi.novaposhta.ua/v2.0/json/Address/getCities");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
        $output = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);
        return $output;
    }

}