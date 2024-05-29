<html>
    <head>
        <title>All Employees</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $query = "SELECT ssn,lname,fname FROM employee order by lname,fname";
        $result = mysqli_query($conn,$query);        
        mysqli_close($conn);
        ?>

        <h4>Employees of Company</h4>
        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">SSN</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Last Name</font></th>
                <th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
            </tr>

            <?php
            $i = 0;
            while ($row= mysqli_fetch_assoc($result)) {
                $essn =$row["ssn"];
                $elname = $row["lname"] ;
                $efname = $row["fname"];
                ?>

                <tr>
                    <td><font face="Arial, Helvetica, sans-serif">
                        <a href="empView.php?ssn=<?php echo $essn; ?>"><?php echo $essn; ?></a></font></td>
                    <td><font face="Arial, Helvetica, sans-serif"><?php echo $elname; ?></font></td>
                    <td><font face="Arial, Helvetica, sans-serif"><?php echo $efname; ?></font></td>
                </tr>

                <?php

            }
            ?>

        </table>

        <P>
            <a href="./">Return to main page</a>

    </body>
</html>
