<?php

namespace Tests\APIController\PATCH\UsersIDName;

class name__Test extends \Test\TestCase\Frontend
{
    protected $setUpDB = ['ru' => ['activities'], 'users' => ['users']];

    public function test_SignatureNotSet()
    {
        $uri = '/api/v1/ru/users/3/name.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e' . '&' . 'foo_name=' . urlencode('Sasha');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'User "name" property null must be a string',
        ];

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEquals($expected_response, json_decode($response_body, true));
    }

    public function test_SignatureTooShort()
    {
        $uri = '/api/v1/ru/users/3/name.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e&name=' . urlencode('Fo');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'User "name" property "Fo" must have a length between 2 and 255',
        ];

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEquals($expected_response, json_decode($response_body, true));
    }
}
