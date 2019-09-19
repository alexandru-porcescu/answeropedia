<?php

namespace Mapper;

abstract class Mapper
{
    protected $lang;
    protected $pdo;

    public function __construct(string $lang)
    {
        $this->lang = $lang;
        $this->pdo = \Helper\PDOFactory::get_connection_to_lang_DB($lang);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}
