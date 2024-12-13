<?php

namespace MyApp;

class View
{
    public static function Render($content, $data = null, $template = VIEWS_PATH."template".EXT)
    {
        require $template;
    }
}