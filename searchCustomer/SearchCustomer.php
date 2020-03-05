<?php

require_once("config.php");

class SearchCustomer {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function viewData() {
        $sql = "SELECT name FROM names";
        $query = $this->con->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $view = $query->fetchAll();

        return $view;
    }

    public function searchData($name) {
        $sql = "SELECT name FROM names WHERE name LIKE :name";
        $query = $this->con->prepare($sql);
        $query->execute(["name" => "%" . $name . "%"]);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $search = $query->fetchAll();
        
        return $search;
    }
}