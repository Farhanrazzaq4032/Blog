<?php

namespace App\Database;

use mysqli;

class DB
{
    private $host_name = "localhost", $user_name = "root", $db_pass = "", $db_name = "blog";
    public $con;
    public $result;

    function __construct()
    {
        $this->con = null;
        $this->con = new mysqli($this->host_name, $this->user_name, $this->db_pass, $this->db_name);
        if ($this->con->connect_error) {
            echo "MySqli Error" . $this->con->connect_error;
            exit();
        }
    }

    function runQuery($sql)
    {
        $this->result = $this->con->query($sql);
        if (!$this->result) {
            echo "Query Error: " . $this->con->error;
            exit();
        }
    }

    function getRecord($single)
    {
        $data = array();
        if ($single) {
            $data = mysqli_fetch_assoc($this->result);
        } else {
            while ($row = mysqli_fetch_assoc($this->result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function select($sql, $single = false) // use false to get all the data
    {
        $this->runQuery($sql);
        return $this->getRecord($single);
    }

    function insert($sql){
        $this->runQuery($sql);
    }
    function update($sql) {
        $this->runQuery($sql);
    }

    function delete($sql) {
        $this->runQuery($sql);
    }
}
