<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attedance Management System</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="container">
        <h3 class="container h3">Student Attendance</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Choice: 
        <select name = "option">   
            <option value="viewattendance">View Attendance</option> }
            <option value="markattendance">Mark Attendance</option>
        </select>
        <input name = "optionsubmit" value = "Confirm" type="submit">
        </form> 
       
    </div>
    <div class = "container">

<?php include 'config.php';
    if (isset($_POST['optionsubmit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {                            
            $option = $_POST['option'];
            if (empty($option)) {
            echo "Please Select option.";
            }
            else{

                if($option == "viewattendance"){
                    echo '<h4 style="text-align:center; align-content: center;" class="container h3">View Attendance</h4>';
                    $my_connection = openCon();
                    echo "<br>";
                    $db = "studentdata";
                    $sql_query = "select * from studentdata;";  
                    $result = mysqli_query($my_connection,$sql_query);
                    if(mysqli_num_rows($result)>0){        
                        echo '<table>
                                <thead>
                                    <tr>
                                        <th>Student Roll Number</th>
                                        <th>Student Name</th>';
                                        
                                
                                while($row = mysqli_fetch_array($result)){
                                    $columns = mysqli_num_fields($result);
                                    if($row['studentid'] == 0){                                        
                                        for($i=0;$i<($columns-2);$i++){
                                            $index = 'dates'.(string)$i;
                                            echo '<th>'.$row[$index].'</th>';
                                        }
                                        echo '</tr>
                                    </thead>';
                                    }
                                    else{
                                        echo"<tr>";
                                        echo "<td>".$row['studentid']."</td>";                
                                        echo "<td>".$row['studentnames']."</td>";
                                        for($i=0;$i<($columns-2);$i++){
                                            $index = 'dates'.(string)$i;
                                            echo '<td>'.$row[$index].'</td>';
                                        }
                                        echo"</tr>";
                                    }
                                    
                                }
                    }          
                     
                                    
                }
                else{
                    echo '<h4 style="text-align:center; align-content: center;" class="container h3">Mark Attendance</h4>';
                    ?>
                     <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        Date: 
                        <select name = "date">   
                            <option value="<?php echo (string)date("Y/m/d")?>"><?php echo (string)date("Y/m/d")?></option> }
                        </select>
                    </form> 
                    <?php
                      $my_connection = openCon();
                      echo "<br>";
                      $db = "studentdata";
                      $sql_query = "select * from studentdata;";  
                      $result = mysqli_query($my_connection,$sql_query);
                      if(mysqli_num_rows($result)>0){        
                          echo '<table>
                                  <thead>
                                      <tr>
                                          <th>Student Roll Number</th>
                                          <th>Student Name</th>';
                                          echo '<th>'.(string)date("Y/m/d").'</th>
                                    </thead>';
                                  
                                  while($row = mysqli_fetch_array($result)){
                                    if($row['studentid']!=0){
                                    echo "<tr><td>".$row['studentid']."</td>";                
                                    echo "<td>".$row['studentnames']."</td>";
                                    echo '<td>
                                        
                                            <select name = "attendance">   
                                                <option value="P">P</option>}  
                                                <option value="A">A</option>
                                                <option value="L">L</option>
                                                
                                            </select>
                                            
                                        
                    
                                      </td></tr>';
                                    }
                                  }
                                  echo '</table>';
                                  echo '<input name = "updatedatabase" value = "Confirm" type="submit">';
                        }
                }
            }
        }
    }

?>
</div>
    <script src="index.js"></script>
</body>
</html>