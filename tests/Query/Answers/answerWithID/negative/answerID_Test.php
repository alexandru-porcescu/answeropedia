<?php

class Query_Answers_answer_with_ID_answerID_Test extends Abstract_DB_TestCase
{
    public function testQuestionIDEqualZero()
    {
        $this->expectExceptionMessage('Answer id param 0 must be greater than or equal to 1');
        $question = (new Answers_Query('ru'))->answer_with_ID(0);
    }

    public function testQuestionIDNegative()
    {
        $this->expectExceptionMessage('Answer id param -1 must be greater than or equal to 1');
        $question = (new Answers_Query('ru'))->answer_with_ID(-1);
    }
}
