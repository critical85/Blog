<?php

    include('config/db_connection.php');

// parametr formats:    $table:     STRING
//                      $input:     ASSOC ARRAY
//                      $filter:    ASSOC ARRAY
//                      $sorted_by: ARRAY
//                      $id: ASSOC: ARRAY
//                      $order:     STRING (optional)

// fuctions for SQL queries
// ************************************************************************** //
    function insert_SQL($table, $input=[]){

        global $pdo;

        // create a query
        $sql = "INSERT INTO $table(";
        $i = 0;
        foreach($input as $key=>$value){
            if($i==0){
                $sql = $sql . "$key";
                $i ++;
            }else{
                $sql = $sql . ", $key";
            }
        }
        $sql = $sql . ") VALUES (";
        $i = 0;
        foreach($input as $key=>$value){
            if($i==0){
                $sql = $sql . "'$value'";
                $i++;
            }else{
                $sql = $sql . ", '$value'";
            }
        }       
        $sql = $sql . ")";

        // run the query        
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
    }

// ************************************************************************** //
    function select_SQL($table, $filter, $sorted_by, $order='ASC'){
        global $pdo;
        $sql = "SELECT * FROM $table";

        // if there is a filter
        if(!empty($filter)){
            $i = 0;
            foreach($filter as $key=>$value){
                // for first filter put WHERE and 
                if($i==0){
                    $sql = $sql . " WHERE $key = '$value'";
                    $i ++;
                }
                // for other filters put AND
                else{
                    $sql = $sql . " AND $key = '$value'";
                }
            }            
        }

        // if there is a sorting parametr
        if(!empty($sorted_by)){
            $sql = $sql . " ORDER BY";
            foreach($sorted_by as $key){
                $sql = $sql . " $key";
            }
            $sql = $sql . " $order";
        }

        // run the query
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        // put results in variable
        $result = $stmt->fetchAll();
        return $result;
    }


// ************************************************************************** //
    function delete_SQL($table, $id){
        global $pdo;

        // create a query
        $sql = "DELETE FROM $table";

        foreach($id as $key=>$value){
            $sql = $sql . " WHERE $key = '$value'";
        }

        // run the query
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }


// ************************************************************************** //
    function update_SQL($table, $id, $input){
        global $pdo;

        // create a query
        $sql = "UPDATE $table SET ";
        $i = 0;
        foreach($input as $key=>$value){
            if($i == 0){
                $sql = $sql . "$key = '$value'";
                $i++;
            }
            else{
                $sql = $sql . ", $key = '$value'";
            }
        }

        foreach($id as $key=>$value){
            $sql = $sql . " WHERE $key = $value";
        }

        // run the query
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }


// ************************************************************************** //
    // help function to print arrays for debug
    function print_array($array){
        echo "<pre>", print_r($array, true), "</pre>";
        die();
    }
?>