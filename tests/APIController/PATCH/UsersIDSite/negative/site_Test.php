<?php

namespace Tests\APIController\PATCH\UsersIDSite;

class site__Test extends \Test\TestCase\Frontend
{
    protected $setUpDB = ['ru' => ['activities'], 'users' => ['users']];

    public function test_IncorrectURL()
    {
        $uri = '/api/v1/ru/users/3/site.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e' . '&' . 'site=' . urlencode('xxx');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'User "site" property "xxx" must be a URL',
        ];

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEquals($expected_response, json_decode($response_body, true));
    }

    public function test_SiteNotSet()
    {
        $uri = '/api/v1/ru/users/3/site.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e' . '&' . 'foo_site=' . urlencode('https://answeropedia.org');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'User "site" property null must be a string',
        ];

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEquals($expected_response, json_decode($response_body, true));
    }
}
