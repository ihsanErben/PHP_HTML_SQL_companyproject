<!DOCTYPE html>
<html>
    <head>
        <title>Simple Database Access</title>
    </head>
    <body>
        <?php 
        include './dbconnect.php';        
        $query="SELECT ssn FROM employee";
        $result=mysqli_query($conn,$query);
        $num=mysqli_num_rows($result);
        mysqli_close($conn);
        ?>
        <h4>Employee Details for:</h4>
        <form method="post" action="displayemp.php">
            <select name="ssn">
                <?php
                $index=0;
                while ($row= mysqli_fetch_assoc($result)) {
                    $ssn2=$row["ssn"];
                    echo "<option>",$ssn2,"\n";                    
                }
                ?>
            </select>
            <input type="submit" value="Get Employee Details">
        </form>
    </body>
</html>

