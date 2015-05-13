<?php

class SQLQuery {
    protected $_dbHandle;
    protected $_result;

    private $stmt;
    /** Connects to database **/

    function connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) {
      if(!$this->_dbHandle) {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  							 PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        try {
          $this->_dbHandle = new PDO(
            DB_TYPE . ':host=' . $DB_HOST . ';dbname=' .
            $DB_NAME . ';port=' . DB_PORT . ';charset=' . DB_CHARSET,
            $DB_USER, $DB_PASS, $options
          );
        } catch (PDOException $e) {
          print "Error!:" . $e->getMessage() . "<br />";
          $this->disconnect();
          die();
        }
      }
    }

    /** Disconnects from database **/

    function disconnect() {
        $this->_dbHandle = null;
    }

     function query($query) {
      $this->stmt = $this->_dbHandle->prepare($query);
    }

     function execute() {
      return $this->stmt->execute();
    }

     function bind($param, $value, $type = null) {
      if(is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }
      $this->stmt->bindValue($param, $value, $type);
    }

    /** CRUD FUNCTIONS **/

    /** Select All Function **/
    function selectAll($table) {
    	$sql = 'SELECT * FROM ' . $table;
    	$this->query($sql);
      return $this->resultSet();
    }

    function select($table, $params, $cols) {
      $binded = implode($params, ' = :' . $params);
      $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $binded;
      $this->query($sql);
      for($i = 0; $i < count($params); $i++) {
        $bind = ':' . $cols[$i];
        $this->bind($bind, $params[$i]);
      }
  		return $this->single();
    }

    function insert($table, $params, $cols) {
      $columnString = implode(', ', array_values($cols));
      $valueString = ":".implode(', :', array_values($cols));
      $sql = "INSERT INTO $table (" . $columnString . ") VALUES (" . $valueString . ")";
      $this->query($sql);
      for($i = 0; $i < count($params); $i++) {
        $bind = ':' . $cols[$i];
        $this->bind($bind, $params[$i]);
      }
      return $this->execute();
    }

    /** END CRUD FUNCTIONS **/

    function resultSet() {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function single() {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /** Get number of rows **/
    function getNumRows() {
        return $this->stmt->rowCount();
    }

     function lastInsertId() {
      return $this->_dbHandle->lastInsertId();
    }

    /** TRANSACTION FUNCTIONS **/
     function beginTransaction() {
      return $this->_dbHandle->beginTransaction();
    }

     function endTransaction() {
      return $this->_dbHandle->commit();
    }

     function cancelTransaction() {
      return $this->_dbHandle->rollBack();
    }

    /** END TRANSACTION FUNCTIONS **/
     function debugDumpParams() {
      return $this->stmt->debugDumpParams();
    }
}
