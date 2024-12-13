<?php

namespace MyApp;

class ErrorController extends Controller
{

    function index()
    {
        View::Render("pagenotfound");
    }
}