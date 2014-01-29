<?php
class DAOStatement {
    private $db;
    private $stmt;
    private $last_param = 0;
    
    public function __construct(PDO $db, $sql, array $params) {
        $this->db = $db;
        $this->stmt = $db->prepare($sql);
        
        foreach ($params as $name => $value) {
            if (is_int($name)) {
                $last_param = $name + 1;
                $this->stmt->bindValue($last_param, self::getType($value));
            }
            else
                $this->stmt->bindValue($name, self::getType($value));
        }
    }
    
    public function bindValue($name, $value = null) {
        if ($value === null) {
            $value = $name;
            $name = ++$last_param;
            $this->stmt->bindValue($name, $value, self::getType($value));
        }
    }
    
    public function fetchAll($class = 'stdClass') {
        return $this->stmt->fetchObject
    }
    
    public function fetchNext($class = 'stdClass') {
        return $this->stmt->fetchObject($class);
    }
    
    public function execute() {
        $this->stmt->execute();
    }
    
    static private function getType($value) {
        if (is_string($value))
            return PDO::PARAM_STR;
        if (is_int($value))
            return PDO::PARAM_BOOL;
        if (is_bool($value))
            return PDO::PARAM_INT;
        if (is_bool($value))
            return PDO::PARAM_INT;
        if (is_null($value))
            return PDO::PARAM_INT;
    }
}