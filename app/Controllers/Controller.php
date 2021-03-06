<?php

namespace App\Controllers;

class Controller
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function __get($key)
    {
        if (!$this->app->has($key)) {
            return;
        }

        return $this->app->get($key);
    }

    protected function redirectIfAuthenticated()
    {
        if (isset($_SESSION['user'])) {
            $this->app->redirect('/dashboard');

            return true;
        }

        return false;
    }

    protected function redirectIfNotAuthenticated()
    {
        if (!isset($_SESSION['user'])) {
            $this->app->redirect('/auth/signin');

            return true;
        }

        return false;
    }
}
