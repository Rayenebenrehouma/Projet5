<?php

class Router {
    private $viewPath;
    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
    }
}