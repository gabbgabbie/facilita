<?php

namespace Source\Web;

class Owner extends Controller
{
    public function __construct()
    {
        parent::__construct("app/dono");
    }

    public function register(): void
    {
        echo $this->view->render("register",[]);
    }

      public function home(): void
    {
        echo $this->view->render("home",[]);
    }

    public function employees(): void
    {
        echo $this->view->render("employees",[]);
    }

    public function products(): void
    {
        echo $this->view->render("products",[]);
    }
    public function orders(): void
    {
        echo $this->view->render("orders",[]);
    }
    public function tasks(): void
    {
        echo $this->view->render("tasks",[]);
    }
    public function profile(): void
    {
        echo $this->view->render("profile",[]);
    }

     public function password(): void
    {
        echo $this->view->render("change-password",[]);
    }

    public function cafeProfile(): void
    {
        echo $this->view->render("cafe-profile",[]);
    }

}