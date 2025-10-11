<?php

namespace Source\Web;

class Employee extends Controller
{
    public function __construct()
    {
        parent::__construct("app/funcionario");
    }

      public function home(): void
    {
        echo $this->view->render("home",[]);
    }

        public function profile(): void
    {
        echo $this->view->render("profile",[]);
    }

    public function password(): void
    {
        echo $this->view->render("change-password",[]);
    }

}