<?php

namespace Source\Web;

class Site extends Controller
{
    public function __construct()
    {
        parent::__construct("web");
    }

    public function home(): void
    {
        //echo "Home Page...";
        echo $this->view->render("home",[]);
    }

    public function about(): void
    {
        echo $this->view->render("about",[]);
    }

    public function contact(): void
    {
        echo $this->view->render("contact",[]);
    }

    public function plans(): void
    {
        echo $this->view->render("plans",[]);

    }

    public function faqs(): void
    {
        echo $this->view->render("faqs",[]);
    }

    public function login(): void
    {
        echo $this->view->render("login",[]);
    }

    public function error (array $data): void
    {
        echo "Error {$data["errcode"]}...";
    }

    public function register (array$data): void
    {
        echo $this->view->render("register");
    }

        public function passwordCode(): void
    {
        echo $this->view->render("forgot-password",[]);
    }

    public function resetPassword(): void
    {
        echo $this->view->render("reset-password",[]);
    }

}