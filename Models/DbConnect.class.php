<?php

class DbConnect extends PDO{
    private $dsn;
    private $username;
    private $pass;
    private $options;

    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=lacaissecommune;port=8889;charset=utf8';
        $username = "root";
        $pass = "root";
        // $dsn = 'mysql:dbname=emmanuhlcc;host=emmanuhlcc.mysql.db;charset=utf8';
        // $username = "emmanuhlcc";
        // $pass = "N2tiveteekimingitypt91";
        $options= [];
        parent::__construct($dsn, $username, $pass, $options);
    }
}