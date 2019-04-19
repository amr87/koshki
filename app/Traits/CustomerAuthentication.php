<?php

namespace App\Traits;

//dependencies
use GuzzleHttp\Client;
use Laravel\Passport\Client as ClientModel;
use App\Traits\ResponseTrait;
use App\Traits\FacebookAuth;

trait CustomerAuthentication
{
    use ResponseTrait,FacebookAuth;
    
    /**
     * The Token Auth URL of passport.
     *
     * @var string
     */
    
    protected $authUrl = '/oauth/token';
    
    
    /**
     *
     * @param Request $request
     * @return
     */
    protected function getAccessTokens($request)
    {
        $client = new Client();
        $passwordGrant = $this->passwordClient();
        $formParams = [
            'grant_type'     => 'password',
            'client_id'      => $passwordGrant->id,
            'client_secret'  => $passwordGrant->secret,
            'username'       => $request->username,
            'password'       => $request->password
        ];
        
        try {
            $response = $client->post(url($this->authUrl), ['form_params' => $formParams]);
            return $this->responseSuccess(json_decode($response->getBody(), true));
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return $this->responseUnAuthenticated(['message' => 'authentication failed']);
        }
    }

    /**
     * return password client along with it`s secret.
     *
     *@author Amr Gamal <amr.gamal878@gmail.com>
     *
     *@return \Laravel\Passport\Client Password Client
     *
     */
    protected function passwordClient()
    {
        return ClientModel::where('name', config('app.name').' Password Grant Client')
                ->first();
    }
}
