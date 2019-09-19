<?php

class Trait_Model_Category__init_with_DB_state__Test extends PHPUnit\Framework\TestCase
{
    public function test__Init_category_with_DB_state()
    {
        $category = Category_Model::init_with_DB_state([
            'c_id'            => 13,
            'c_title'         => 'virtual',
            'c_words'         => 'cpu',
            'cat_is_redirect' => 0,
        ]);

        $this->assertEquals(13, $category->id);
        $this->assertEquals('virtual', $category->title);
    }

    public function test__Init_category_with_DB_state_on_Russian()
    {
        $category = Category_Model::init_with_DB_state([
            'c_id'            => 231,
            'c_title'         => 'Медицинские услуги',
            'c_words'         => 'таблетка',
            'cat_is_redirect' => 0,
        ]);

        $this->assertEquals(231, $category->id);
        $this->assertEquals('Медицинские услуги', $category->title);
    }

    public function test__Error_when_init_category_with_empty_state()
    {
        $this->expectExceptionMessage('Category init with empty state');
        $category = Category_Model::init_with_DB_state([]);
    }
}
