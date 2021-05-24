<?php
    function openCon(){
        $server = "localhost";
        $username = "root";
        $password = ""; 
        
        
        $con = mysqli_connect($server,$username,$password) or die("connection to database failed ".mysqli_connect_error());
        
            echo "Successful connection to the database";
        
        return $con;
    }

    function closeCon($con)
    {
        echo "Closing Connection";
        $con -> close();
    }
    $my_connection = openCon();
    $sql_query = "select studentnames from studentdata";
    $result = $my_connection->query($sql_query);
   
    closeCon($my_connection);
    
?>