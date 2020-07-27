<?php
include_once('../config/database.php');
include_once('../helper/format.php');

class UserController
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm= new Format();
    }
}
?>