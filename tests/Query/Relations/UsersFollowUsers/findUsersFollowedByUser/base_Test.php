<?php

class UsersFollowQuestions_Relations_Query__find_users_followed_by_user__Test extends Abstract_DB_TestCase
{
    protected $setUpDB = ['ru' => ['er_users_follow_users']];

    public function test__RelationExists()
    {
        $followed = (new UsersFollowUsers_Relations_Query('ru'))->find_users_followed_by_user(4);

        $this->assertEquals(1, $followed[0]);
        $this->assertEquals(5, $followed[1]);
        $this->assertEquals(7, $followed[2]);

        $this->assertEquals(3, count($followed));
    }

    public function test__RelationNotExists()
    {
        $followed = (new UsersFollowUsers_Relations_Query('ru'))->find_users_followed_by_user(12);

        $this->assertEquals(0, count($followed));
    }
}
