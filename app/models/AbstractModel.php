<?php

class AbstractModel {
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }
}