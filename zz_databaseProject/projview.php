<html>
    <head>
        <title>Project View</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $pnum = $_GET['pnum'];
        $query = "SELECT pname,plocation,dnum,dname FROM project,department where pnumber=$pnum and dnum=dnumber";
        $result = mysqli_query($conn,$query);
        
        $row= mysqli_fetch_assoc($result);
        $pname = $row["pname"] ;
        $ploc = $row[ "plocation"];
        $pdnum = $row[ "dnum"];
        $pdname = $row["dname"];

        echo "<b>Project: </b>", $pname, "<br>";
        echo "Project Location: ", $ploc, "<br>";
        echo "Controlling Department: <a href=\"deptView.php?dno=", $pdnum, "\">", $pdname, "</a>";

        echo "<h4>Employees working in project:</h4>";
        $query = "SELECT ssn,lname,fname,hours FROM employee,works_on where pno=$pnum and essn=ssn";
        $result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            ?>
            <table border="2" cellspacing="2" cellpadding="2">
                <tr>
                    <th><font face="Arial, Helvetica, sans-serif">Employee SSN</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Employee Last Name</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Employee First Name</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Hours</font></th>
                </tr>
                <?php
                $i = 0;
                while ($row= mysqli_fetch_assoc($result)) {
                    $essn = $row["ssn"];
                    $elname = $row["lname"];
                    $efname = $row["fname"];
                    $hours = $row["hours"];
                    ?>  
                    <tr>
                        <td><font face="Arial, Helvetica, sans-serif">
                            <a href="empView.php?ssn=<?php echo $essn; ?>"><?php echo $essn; ?></a></font></td>
                        <td><font face="Arial, Helvetica, sans-serif"><?php echo $elname; ?></font></td>
                        <td><font face="Arial, Helvetica, sans-serif"><?php echo $efname; ?></font></td>
                        <td><font face="Arial, Helvetica, sans-serif"><?php echo $hours; ?></font></td>
                    </tr>
                    <?php
                    $i++;
                }
            } else{
                echo "Project has no employees<br>";
            }
            echo "</table>";

            mysqli_close($conn);
            ?>

            <P>
                <a href="./">Return to main page</a>

                </body>
                </html>
