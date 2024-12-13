<?php

namespace MyApp;

abstract class  Controller
{
    abstract public function index();

    protected $data = [];

    public function __construct()
    {
        $this->initOptions();
        $this->initNavigate();

        $this->data['error'] = null;
        $this->data['message'] = null;
        $this->data['success'] = null;
    }

    private function initNavigate() {
        $navModel = new NavigateModel();
        $this->data['navigate'] = $navModel->getNavTree();
    }

    private function initOptions() {
        $optModel = new OptionsModel();
        $this->data['options'] = $optModel->getAllOption();
        $optTemp = [];
        foreach ($this->data['options'] as $key => $option) {
            $optTemp[$option['name']] = $option;
        }
        $this->data['options'] = $optTemp;
    }
}