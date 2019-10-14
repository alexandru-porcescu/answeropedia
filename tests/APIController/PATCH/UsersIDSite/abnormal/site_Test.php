<?php

namespace Tests\APIController\PATCH\UsersIDSite\Abnormal;

class site__Test extends \Test\TestCase\Frontend
{
    protected $setUpDB = ['ru' => ['activities'], 'users' => ['users']];

    public function test__URLWithoutProtocol()
    {
        $uri = '/api/v1/ru/users/3/site.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e&site=' . urlencode('example37.com');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'User "site" property "example37.com" must be a URL',
        ];

        $this->assertEquals($expected_response, json_decode($response_body, true));
        $this->assertSame(200, $response->getStatusCode());
    }

    public function test__URLWithWWW()
    {
        $uri = '/api/v1/ru/users/3/site.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e&site=' . urlencode('www.example32.com');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'User "site" property "www.example32.com" must be a URL',
        ];

        $this->assertEquals($expected_response, json_decode($response_body, true));
        $this->assertSame(200, $response->getStatusCode());
    }
}
