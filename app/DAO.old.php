<?php
class DAO {
    public $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function query($sql, array $params() = array()) {
        return new DAOStatement($this->db, $sql, $params);
    }
}