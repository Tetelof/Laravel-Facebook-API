<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FacebookController extends Controller
{
    public function loginFacebook()
    {
        $fb = new \League\OAuth2\Client\Provider\Facebook([
        'clientId' => '726045905277208',
        'clientSecret' => '6001689f44e4b503a5b09c664cbf87c4',
        'redirectUri' => 'https://localhost/laravel/teste/public/fb-callback',
        'graphApiVersion' => 'v14.0',
        ]);

        $authUrl = $fb->getAuthorizationUrl([
            "scope" => ["email"]
        ]);
        echo "<a href='{$authUrl}'>Logar no seu Facebook!</a>";
    }

    public function loginCallback()
    {


        $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRIPPED);
        if(isset($code)){
            $fb = new \League\OAuth2\Client\Provider\Facebook([
                'clientId' => '726045905277208',
                'clientSecret' => '6001689f44e4b503a5b09c664cbf87c4',
                'redirectUri' => 'https://localhost/laravel/teste/public/fb-callback',
                'graphApiVersion' => 'v14.0',
            ]);
            $token = $fb->getAccessToken("authorization_code", ["code" => $code]);
            // echo "token: $token";
            $user = $fb->getResourceOwner($token);
            echo "<img width:'120' src='{$user->getPictureUrl()}' /><br>User = {$user->getFirstName()}";
        }

    }

    public function webhook()
    {
        Log::info("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        Log::info($_GET);
        Log::info($_REQUEST);
    }
}
