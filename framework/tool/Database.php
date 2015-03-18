<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace tool;

class Database extends Singleton {

    private $_connstr;
    private $_conn;

    /**
     * Method to connect to the database
     * @param  String $host     The host where of the MySQL database
     * @param  String $dbname   The database name
     * @param  String $username The username
     * @param  String $password The password
     */
    public function connect($host, $dbname, $username, $password = '') {
        $this->_connstr = sprintf(
            'mysql:host=%s;dbname=%s;',
            $host,
            $dbname
        );

        $this->_conn = new \PDO($this->_connstr, $username, $password);
        $this->_conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        $this->_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->_conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    /**
     * Method to close the connection
     */
    public function close() {
        $this->_conn = null;
    }

    /**
     * Method to begin a transaction.
     * @return PDO::Transaction The transaction
     */
    public function beginTransaction(){
        return $this->_conn->beginTransaction();
    }

    /**
     * Method to execute a select statement on the database
     * @param  String  $query    The statement to be executed
     * @param  Array   $params   The parameters to be sent along the statement
     * @param  Boolean $override True: fetch all rows, False: fetch one row or false if not succeeded
     * @return Object            Array of rows or Row or False depending on override
     */
    public function select($query, $params = array(), $override = false) {
        $stmt = $this->_conn->prepare($query);
        $stmt->execute($params);
        $rows = $stmt->rowCount();
        if($override || $rows > 1)
            return $stmt->fetchAll();
        else if($rows == 1)
            return $stmt->fetch();
        
        return false;
    }

    /**
     * Method to execute a command statement on the database
     * @param  String  $query    The statement to be executed
     * @param  Array   $params   The parameters to be sent along the statement
     * @param  Boolean $override True: return array with rows, False: true if succeeded, false otherwise
     * @return Object            Array of rows or True if succeeded/False if not succeeded
     */
    public function command($query, $params = array(), $override = false) {
        $stmt = $this->_conn->prepare($query);
        $stmt->execute($params);
        $rows = array(
            "rowCount" => $stmt->rowCount(),
            "lastInsertId" => $this->_conn->lastInsertId()
        );
        if ($override && $rows > 0)
            return $rows;
        else if ($rows > 0)
            return true;
        
        return false;
    }

    /**
     * Method to end the certain transaction
     * @return Boolean If the transaction succeeded
     */
    public function endTransaction(){
        return $this->_conn->commit();
    }

    /**
     * Method to cancel the transaction
     * @return Boolean If the rollback succeeded
     */
    public function cancelTransaction(){
        return $this->_conn->rollBack();
    }

    /**
     * Destruct, calls close to always close connection
     */
    public function __destruct() {
        $this->close();
    }
}