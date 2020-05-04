<?php

/**
 * PDOFactory provide a PDO object.
 *
 * PDOFactory can have multiple methods used to get a PDO
 * object connected to a database using the required driver.
 * Every methods return a PDO object or void if something
 * went wrong.
 *
 * Example:
 * $db = PDOFactory::mySql("localhost", "test", "root", "");
 *
 * @author  Alexis
 * @version 1.0
 * @access  public
 */
abstract class PDOFactory {

    /**
     * Get connection to MySQL DB with PDO.
     *
     * Create a new PDO using MySQL driver, credentials
     * in parameters and UTF-8 charset. The PDO object
     * is set to "error mode". It can be useful to debug
     * but it should be removed before publishing the
     * website.
     *
     * @function    mySql
     * @access      public
     * @param       string          $host       Hostname or IP to database
     * @param       string          $dbname     Database name
     * @param       string          $user       Username to connect with
     * @param       string          $password   User's password
     * @return      PDO|void                    PDO Object or nothing if there's a problem
     */
    public static function mySql($host, $dbname, $user, $password) {

        try {

            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", "$user", "$password");

            // REMOVE BEFORE PUBLISHED ONLINE
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;

        } catch (Exception $error) {

            die($error->getCode().": ".$error->getMessage());
        }
    }

    /**
     * Send a query using PDO.
     *
     * This method send a query with all vars and
     * it will return the response unless $return
     * is false. This method is used to prevent
     * code duplication and to simplify the way to
     * send query.
     *
     * @function    sendQuery
     * @access      public
     * @param       PDO             $db         PDO Object
     * @param       string          $sql        SQL Query to execute
     * @param       array           $vars       Array of vars to add to the query
     * @param       bool            $return     Should the method return the result of the query?
     * @return      array|string|void           Array with SQL response, error message as string or nothing.
     */
    public static function sendQuery($db, $sql, $vars = [], $return = true) {

        $query = $db->prepare($sql);
        $result = [];

        // Add vars
        foreach ($vars as $name => $value) {

            if      (is_int($value))    $type = PDO::PARAM_INT;
            elseif  (is_bool($value))   $type = PDO::PARAM_BOOL;
            else                        $type = PDO::PARAM_STR;

            $query->bindValue(":$name", $value, $type);
        }

        // Execute query and get response
        $query->execute();
        if ($return) while ($d = $query->fetch(PDO::FETCH_ASSOC)) { $result[] = $d; }

        // Stop the cursor and return the response
        $query->closeCursor();
        if ($return) return $result;
    }
}