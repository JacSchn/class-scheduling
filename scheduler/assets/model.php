<?php

class Model {

    public $_db; // property to store database connection
    public $_sql; // property to store SQL statement

    public function __construct() {
 /*
 Establish database connection using getDb( ) static method of the Db class
 */
        $this->_db = Db::getDb();  
    }

    public function setSql($sql) {
        $this->_sql = $sql;
    }

    public function getAll($parameter_values = null) {
 /* 
 This method returns an array of objects
 */
        if (!$this->_sql) {
            throw new Exception("No SQL query defined!");
        }
        // Prepare and execute SQL statement
        $stm = $this->_db->prepare($this->_sql);
        $stm->execute($parameter_values);

        //Fetch and return result set
        return $stm->fetchAll();
    }




    public function getOne($parameter_values = null) {
 /* 
 This method returns a single objects
 */

        if (!$this->_sql) {
            throw new Exception("No SQL query defined!");
        }


        // Prepare and execute SQL statement
        $stm = $this->_db->prepare($this->_sql);
        $stm->execute($parameter_values);

        // Fetch and return result set
        return $stm->fetch();
    }

    public function sendUpdate($parameter_values = null) {
        if (!$this->_sql) {
            throw new Exception("No SQL query defined!");
        }
        $stm = $this->_db->prepare($this->_sql);
        $stm->execute($parameter_values);
    }

}