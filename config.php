<?php
    function openCon(){
        $server = "localhost";
        $username = "root";
        $password = ""; 
        $db = "students";
        
        $con = mysqli_connect($server,$username,$password,$db) or die("connection to database failed ".mysqli_connect_error());
        
            
        
        return $con;
    }

    function closeCon($con)
    {
        echo "Closing Connection";
        $con -> close();
    }
    
    
?>