<?php
    $hname='localhost';
    $uname='root';
    $pass='';
    $db='piihotel';

    $con=mysqli_connect($hname,$uname,$pass,$db);
    if(!$con){
        die("Can't connect to database".mysqli_connect_error());
    }
    
    function filteration($data){
        foreach($data as $key =>$value){
            $value=trim($value);
            $value=stripcslashes($value);
            $value=htmlspecialchars($value);
            $value=strip_tags($value);

            $data[$key]=$value;
        }
        return $data;
    }
    function selectAll($table){
        $con=$GLOBALS['con'];
        $res=mysqli_query($con,"SELECT*FROM $table");
        return $res;
    }
    
    function select($sql,$values,$datatypes){
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {   
                mysqli_stmt_close($stmt);
                die("QUERRY can't be executed - SELECT");
            }
        }
        else{
            die("QUERRY can't be executed - SELECT");
        }
    }
    function update($sql,$values,$datatypes){
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res =mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {   
                mysqli_stmt_close($stmt);
                die("QUERRY can't be executed - UPDATE");
            }
        }
        else{
            die("QUERRY can't be executed - UPDATE");
        }
    }
    function insert($sql,$values,$datatypes){
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res =mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else {   
                mysqli_stmt_close($stmt);
                die("QUERRY can't be executed - INSERT. Error: " . mysqli_stmt_error($stmt));
            }
        }
        else{
            die("QUERRY can't be executed - INSERT");
        }
    }
    function del($sql,$values,$datatypes){
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res =mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {   
                mysqli_stmt_close($stmt);
                die("QUERRY can't be executed - DE");
            }
        }
        else{
            die("QUERRY can't be executed - DE");
        }
    }
?>