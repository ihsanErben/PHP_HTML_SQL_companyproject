<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        include './dbconnect.php';        
        $query="SELECT * FROM department";
        $result=mysqli_query($conn,$query);
        
        mysqli_close($conn);
        ?>
        <h4>Get Department Details for:</h4>
        <form method="post" action="departmentDetails.php">
            <select name="dnumber">
                <?php
                
                while ($row= mysqli_fetch_assoc($result)) {
                    $dnumber=$row["dnumber"];
                    $dname = $row["dname"];
                     echo  "<option> $dnumber \n";
                
                }
                ?>
            </select>
            <input type="submit" value="Get Department Details">
        </form>
    </body>
</html>
