<?php

namespace MyApp;

class MainController extends Controller
{

    public function index()
    {
        View::Render("main", $this->data);
    }
}