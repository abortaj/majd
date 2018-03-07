<?php

namespace App\Traits;
trait IssueToken{

    public function passwordGrant($username, $password)
    {
        $http = new \GuzzleHttp\Client;
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => 'YovyRqgg5v5aR5V9o8jxWEMLsF0sTAjqsCq3rJO9',

                'username' => $username,
                'password' => $password,
            ],
        ]);
        return json_decode((string) $response->getBody(), true);
    }
}