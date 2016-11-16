<?php
abstract class AbstractDB{

    private $connection;
    protected $keyFieldName;
    protected $baseSQL;
    protected $orderBy;

    public function __construct(PDO $connect){
        $this->connection=$connect;
    }

    abstract protected function getSelect();

    abstract protected function getKeyFieldName();

    protected function getConnection(){
        return $this->connection;
    }

    public function getAll(){
        return $this->getStatement($this->getSelect(), NULL);

    }

    public function findByID($id){
        $sql = $this->getSelect() . " WHERE " . $this->getKeyFieldName() . " = ?";
        return $this->getStatement($sql, $id);
    }
    
    private function getStatement($sql, $id) {
        return DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    }

}

?>
