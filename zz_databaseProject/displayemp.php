<!DOCTYPE html>
<html>
    <head>
        <title>Simple Database Access</title>
    </head>
    <body>
        <h4>Employee Information</h4>
        <?php
        include './dbconnect.php';
        $ssn = $_POST['ssn'];        
        $query = "SELECT * FROM employee where ssn='$ssn'";
        $result = mysqli_query($conn,$query);        
        mysqli_close($conn);
        $i=0;
        echo "<br>First name\t Middle Name\t Last Name<br>";
        while($row= mysqli_fetch_assoc($result)){      
            $fname = $row["fname"];
            $minit = $row["minit"];
            $lname = $row["lname"];                                   
            echo "<b>",$fname,"\t",$minit,"\t", $lname,"</b>";                        
        }
        ?>
    </body>
</html>

