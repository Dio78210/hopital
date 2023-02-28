<?php

require_once(__DIR__."/database/pdo.php");

class Employee{
    public int $id;
    public string $username;
    public string $password;
}