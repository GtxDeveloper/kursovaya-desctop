<?php

namespace MyApp;

use MyApp\DBContext;

class UserMessagesModel extends DBContext
{
    public function __construct()
    {
        parent::__construct('userMessages');
    }
    public function saveMessage($name, $email, $subject, $message) {
        return $this->addOneRow([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ]);
    }
}