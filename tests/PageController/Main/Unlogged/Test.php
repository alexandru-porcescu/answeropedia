<?php

namespace Tests\PageController\Main\Unlogged;

class Test extends \Abstract_Frontend_TestCase
{
    protected $setUpDB = [
        'en' => ['questions', 'revisions', 'categories', 'er_categories_questions'],
        'ru' => ['questions', 'revisions', 'categories', 'er_categories_questions'],
        'users' => ['users']
    ];

    public function test__Main_page()
    {
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI'    => '/en',
        ]);
        $request = \Slim\Http\Request::createFromEnvironment($environment);
        $this->app->getContainer()['request'] = $request;

        $response = $this->app->run(true);
        $response_body = (string) $response->getBody();

        $this->assertStringContainsString('Answeropedia – Ask a question and get one complete answer', $response_body);

        $this->assertStringNotContainsString('Notice:', $response_body);
        $this->assertStringNotContainsString('Warning:', $response_body);

        $this->assertSame(200, $response->getStatusCode());
    }

    public function test__That_RU_page_is_exists()
    {
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI'    => '/ru',
        ]);
        $request = \Slim\Http\Request::createFromEnvironment($environment);
        $this->app->getContainer()['request'] = $request;

        $response = $this->app->run(true);

        $this->assertSame(200, $response->getStatusCode());
    }
}
