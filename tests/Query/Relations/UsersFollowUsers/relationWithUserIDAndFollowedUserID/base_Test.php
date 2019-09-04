<?php

class UsersFollowUsers_Relations_Query__relation_with_user_ID_and_followed_user_ID__Test extends Abstract_DB_TestCase
{
    protected $setUpDB = ['ru' => ['er_users_follow_users']];

    public function test__RelationExists()
    {
        $relation = (new UsersFollowUsers_Relations_Query('ru'))->relation_with_user_ID_and_followed_user_ID(4, 5);

        $this->assertEquals(3, $relation->id);
        $this->assertEquals(4, $relation->userID);
        $this->assertEquals(5, $relation->followedUserID);
        $this->assertEquals('2015-12-16 13:28:56', $relation->createdAt);
    }

    public function test__RelationNotExists()
    {
        $relation = (new UsersFollowUsers_Relations_Query('ru'))->relation_with_user_ID_and_followed_user_ID(3, 99);
        $this->assertEquals(null, $relation);
    }
}
