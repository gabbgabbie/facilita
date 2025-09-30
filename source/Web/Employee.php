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

}