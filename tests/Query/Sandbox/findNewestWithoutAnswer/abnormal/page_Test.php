<?php

class Sandbox_Query__find_newest_without_answer_negative_Page_Test extends Abstract_DB_TestCase
{
    public function testPageEqualZero()
    {
        $this->expectExceptionMessage('Questions list page param 0 must be greater than or equal to 1');
        $questions = (new Sandbox_Query('ru'))->find_newest_without_answer(0);
    }

    public function testPageBelowZero()
    {
        $this->expectExceptionMessage('Questions list page param -1 must be greater than or equal to 1');
        $questions = (new Sandbox_Query('ru'))->find_newest_without_answer(-1);
    }

    public function testPageGreaterThan9999()
    {
        $this->expectExceptionMessage('Questions list page param 10000 must be less than or equal to 9999');
        $questions = (new Sandbox_Query('ru'))->find_newest_without_answer(10000);
    }
}
