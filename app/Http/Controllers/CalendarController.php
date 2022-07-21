<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Microsoft\Graph\Exception\GraphException;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $tenantId = "b33591f4-5713-4216-9d80-16fc968db3bd";
        
        $guzzle = new \GuzzleHttp\Client();
        $url = 'https://login.microsoftonline.com/' .$tenantId. '/oauth2/v2.0/token';
        $token = json_decode($guzzle->post($url, [
            'form_params' => [
                'client_id' => '25d2e5a6-2e93-40d8-b684-99bcb1793207',
                'client_secret' => 'TlX8Q~kiLBT7SuAmdUg3KO7BtL~kfODlCP8tacFy',
                'scope' => 'https://graph.microsoft.com/.default',
                'grant_type' => 'client_credentials',
            ],
        ])->getBody()->getContents());
        // dd($token);
        $this->accessToken = $token->access_token;
        // dd($this->accessToken);

        $accessToken = $this->accessToken;
        // dd($accessToken);
        $graph = new Graph();
        $graph->setBaseUrl("https://graph.microsoft.com/")
               ->setApiVersion("v1.0")
               ->setAccessToken($accessToken); 
        // dd($graph);

        $user = $graph->createRequest("GET", "/users")
                      ->setReturnType(Model\User::class)
                      ->execute();

        // dd($user);

        



        // $graph = new Graph();
        // $graph->setBaseUrl("https://graph.microsoft.com/")
        //        ->setApiVersion("v1.0")
        //        ->setAccessToken($this->accessToken); 
        
        // // dd($graph);

        // $user = $graph->createRequest("GET","/users/calendars")
        //             ->addHeaders(array("Content-Type" => "application/json"))
        //             ->setReturnType(\Microsoft\Graph\Model\User::class)
        //             ->setTimeout("1000")
        //             ->execute();   
        // dd($user);

        return view('calendar.calendar');
    }
}
