<?php

class DBHelper {

    public static function setConnectionInfo($values=Array()) {

        $host=$values['host'];

        $db = $values['database'];

        $user = $values['user'];

        $pass = $values['pass'];

        $charset = $values['charset'];
        
        $port = 3306; //needed for c9 db access


        $conString = "mysql:host=" . $host . ";port=" . $port . ";dbname=" . $db . ";charset=" . $charset;
        $pdo = new PDO($conString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }


    public static function runQuery(PDO $pdo, $sql, $parameters=Array()) {

        if(!is_array($parameters)){

            $parameters = Array($parameters);
        }

        try{


            $statement=null;
            if(!empty($parameters)){
                $statement = $pdo->prepare($sql);

                $statement->execute($parameters);

            }

            else{
                $statement=$pdo->query($sql);

            }
            $list = Array();
            while ($row = $statement->fetch()) {
                array_push($list, $row);
            }
            //Used for viewing the array of query
            // print "<pre>";
            // print_r($list);
            // print "</pre>";
            $pdo = null;
            return $list;

        } catch (PDOException $e){

            echo ("<br>" . $e . "<br>");

        }


    }

}

?>
