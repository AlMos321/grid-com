<?php

namespace App\Http\Controllers;

use App\ApiLocation;

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
        $outputArray = \GuzzleHttp\json_decode($output, true);
        curl_close($ch);
        return $outputArray;
    }

    public function saveLocationsFromApi(){
        $locationsApi = $this->getCities();

        if($locationsApi['success'] != "true"){
            return "some error with getting location api!";
        }

        $locationsApiSaved = ApiLocation::all();
        $locationIdArray = [];

        foreach ($locationsApiSaved as $api){
            $locationIdArray[] = $api->city_id;
        }

        foreach ($locationsApi['data'] as $loc){
            if(!in_array($loc['CityID'], $locationIdArray)){
                ApiLocation::create([
                    'city_id' => $loc['CityID'],
                    'description' => $loc['Description'],
                    'description_ru' => $loc['DescriptionRu'],
                    'ref' => $loc['Ref'],
                    'delivery1' => $loc['Delivery1'],
                    'delivery2' => $loc['Delivery2'],
                    'delivery3' => $loc['Delivery3'],
                    'delivery4' => $loc['Delivery4'],
                    'delivery5' => $loc['Delivery5'],
                    'delivery6' => $loc['Delivery6'],
                    'delivery7' => $loc['Delivery7'],
                    'area' => $loc['Area'],
                    'prevent_entry_new_streets_user' => $loc['PreventEntryNewStreetsUser'],
                    'conglomerates' => \GuzzleHttp\json_encode($loc['Conglomerates']),
                ]);
            }
        }

        return "ok";

    }

}