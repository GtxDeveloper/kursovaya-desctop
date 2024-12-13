<?php

namespace MyApp;

class NavigateModel extends DBContext
{
    public function __construct()
    {
        parent::__construct('navigation');
    }

    public function getNavTree()
    {
        $navbar = $this->getManyRows();
        $parents = [];
        foreach ($navbar as $key => $value) {
            $navbar[$key]['childs'] = [];
        }
        foreach ($navbar as $key => $value) {
            if($value['parentId'] == null) {
                array_push($parents, $value);
            }
        }
        for ($i = 0; $i < count($parents); $i++) {
            foreach ($navbar as $key => $child) {
                if($child['parentId'] == $parents[$i]['Id']) {
                    array_push($parents[$i]['childs'], $child);
                }
            }
        }
        return $parents;
    }
}