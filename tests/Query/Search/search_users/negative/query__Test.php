<?php

class Query_Search__search_users__negative__queryTest extends Abstract_DB_TestCase
{
    public function test__Query_string_is_empty()
    {
        $this->expectExceptionMessage('Search query param "" must have a length between 2 and 32');
        $users = (new Search_Query('users'))->search_users('');
    }

    public function test__Query_string_below_3()
    {
        $this->expectExceptionMessage('Search query param "A" must have a length between 2 and 32');
        $users = (new Search_Query('users'))->search_users('A');
    }

    public function test__Query_string_greater_then_64()
    {
        $this->expectExceptionMessage('Search query param "some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text" must have a length between 2 and 32');
        $users = (new Search_Query('users'))->search_users('some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text');
    }
}