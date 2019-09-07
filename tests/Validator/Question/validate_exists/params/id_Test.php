<?php

class Validator_Question__validate_exists__params__IDTest extends PHPUnit\Framework\TestCase
{
    public function test__ID_equal_zero()
    {
        $question = new Question_Model();
        $question->id = 0;
        $question->title = 'How iPhone 8 are charged?';
        $question->isRedirect = true;

        $this->expectExceptionMessage('Question id param 0 must be greater than or equal to 1');
        Question_Validator::validate_exists($question);
    }

    public function test__ID_below_zero()
    {
        $question = new Question_Model();
        $question->id = -1;
        $question->title = 'How iPhone 8 are charged?';
        $question->isRedirect = true;

        $this->expectExceptionMessage('Question id param -1 must be greater than or equal to 1');
        Question_Validator::validate_exists($question);
    }
}