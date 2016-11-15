<?php
abstract class AbstractDB{

    private $connection;
    protected $keyFieldName;
    protected $baseSQL;

    public function __construct(PDO $connect){
        $this->connection=$connect;
    }

    abstract protected function getSelect();

    abstract protected function getKeyFieldName();

    protected function getConnection(){
        return $this->connection;
    }

    public function getAll(){
        $statement = DBHelper::runQuery($this->getConnection(), $this->getSelect(), NULL);
        return $statement;

    }

    public function findByID($id){
        $sql = $this->getSelect() . " WHERE " . $this->getKeyFieldName() . " = ?";
        $statement = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
        return $statement;
    }

}

?>
