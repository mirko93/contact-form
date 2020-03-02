<?php

class Person {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
}

class Customer extends Person {
    
    private $balance;

    public function __construct($name, $email, $balance) {
        parent::__construct($name, $email, $balance);
        $this->balance = $balance;
        echo "A new " . __CLASS__ . " has been created" . '<br>';
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }

    public function getBalance() {
        return $this->balance;
    }
}

$customer1 = new Customer('John Doe', 'email@email.com', 200);

echo $customer1->getBalance();

