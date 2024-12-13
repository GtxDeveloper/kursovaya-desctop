<?php

namespace MyApp;

use MyApp\Controller;

class AboutController extends Controller
{

    public function index()
    {
        View::Render("about", $this->data);
    }

    public function contactus()
    {
        View::Render("contactus", $this->data);
    }

    public function saveMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (
                !empty($_POST['name']) &&
                !empty($_POST['email']) &&
                !empty($_POST['subject']) &&
                !empty($_POST['message'])
            ) {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $subject = htmlspecialchars($_POST['subject']);
                $message = htmlspecialchars($_POST['message']);
                $userMessModel = new UserMessagesModel();
                if ($userMessModel->saveMessage($name, $email, $subject, $message) == 1) {
                    $this->data['success'] = 'Письмо успешно сохранено';
                } else {
                    $this->data['error'] = 'Сохранение письма прошло неуспешно';
                }
                $this->contactus();
            }
        }
    }
}