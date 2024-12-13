<?php

namespace MyApp;

class OptionsModel extends DBContext
{
    public function __construct()
    {
        parent::__construct('options');
    }
    public function getAllOption() {
        return $this->getManyRows();
    }
    public function getOptionByName($name)
    {
        $result = $this->getManyRows([
            'name' => $name
        ]);
        return $result == null ? null : $result[0];
    }

    public function getOptionsByRelation($relation)
    {
        return $this->getManyRows([
            'relation' => $relation
        ]);
    }
}