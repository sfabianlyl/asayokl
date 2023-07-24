<?php

namespace App\Http\Controllers;

use App\Models\InstagramToken;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MiscController extends BaseController
{
    

    public function ig_oauth(Request $request){
        

        return response()->json($request);
    }

    public function get_posts(){
        $endpoint="https://graph.instagram.com/6745609365520116/media";
        $client= new \GuzzleHttp\Client();
        $token=InstagramToken::orderBy('created_at','DESC')->first()->token;
        $fields="media_url,media_type,permalink,caption";
        do{
            $response=$client->request('GET',$endpoint,['query'=>[
                'access_token'=>$token,
                'fields'=>$fields
            ]]);
            $statusCode = $response->getStatusCode();
        }while($statusCode!=200);
        

        return response($response->getBody())->header('Content-Type', 'application/json');
    }

    
}
