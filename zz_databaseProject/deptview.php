<!DOCTYPE html>
<html>
    <head>
        <title>Department View</title>
    </head>
    <body>

        <?php
        $dno = $_GET['dno'];
        include './dbconnect.php';

        $query = "SELECT dname,mgrssn,mgrstartdate,lname,fname FROM department,employee where dnumber=$dno and mgrssn=ssn";
        $result = mysqli_query($conn,$query);
        
        $row= mysqli_fetch_assoc($result); //exactly one tuple, no need to have loop

        $dname = $row["dname"] ;
        $mssn = $row["mgrssn"];
        $mstart = $row["mgrstartdate"];
        $mlname = $row["lname"];
        $mfname = $row["fname"];

        echo "<b>Department: </b>", $dname;
        echo "<P>Manager: <a href=\"empView.php?ssn=", $mssn, "\">", $mlname, ", ", $mfname, "</a></BR>";
        echo "Manager Start Date: ", $mstart;

        echo "<h4>Department Locations:</h4>";
        $query = "SELECT dlocation FROM dept_locations where dnumber=$dno";
        $result = mysqli_query($conn,$query);        
        
        while ($row= mysqli_fetch_assoc($result)) {
            $dloc = $row["dlocation"];
            echo $dloc, "<br>\n";

        }

        echo "<h4>Employees:</h4>";
        $query = "SELECT ssn,lname,fname FROM employee where dno=$dno";
        $result = mysqli_query($conn,$query);
        
        ?>

        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">Employee SSN</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Last Name</font></th>
                <th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
            </tr>

            <?php            
            while ($row= mysqli_fetch_assoc($result)) {
                $essn = $row["ssn"];
                $elname = $row["lname"];
                $efname = $row["fname"];
                ?>  
                <tr>
                    <td><font face="Arial, Helvetica, sans-serif">
                        <a href="empView.php?ssn=<? echo $essn; ?>"><?php echo $essn; ?></a></font></td>
                    <td><font face="Arial, Helvetica, sans-serif"><?php echo $elname; ?></font></td>
                    <td><font face="Arial, Helvetica, sans-serif"><?php echo $efname; ?></font></td>
                </tr>
                <?php
             
            }
            ?>

        </table>

        <?php
        echo "<h4>Projects:</h4>";
        $query = "SELECT pnumber,pname,plocation FROM project where dnum=$dno";
        $result = mysqli_query($conn,$query);        
        ?>

        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">Project Number</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Location</font></th>
            </tr>

            <?php
            
            while ($row= mysqli_fetch_assoc($result)) {
                $pnum = $row["pnumber"];
                $pname = $row["pname"];
                $ploc = $row[ "plocation"];
                ?>  
                <tr>
                    <td><font face="Arial, Helvetica, sans-serif">
                        <a href="projView.php?pnum=<? echo $pnum; ?>"><?php echo $pnum; ?></a></font></td>
                    <td><font face="Arial, Helvetica, sans-serif"><?php echo $pname; ?></font></td>
                    <td><font face="Arial, Helvetica, sans-serif"><?php echo $ploc; ?></font></td>
                </tr>
                <?php
                
            }

            mysqli_close($conn);
            ?>
        </table>

            <P>
               
 <a href="./">Return to main page</a>
                </body>
                </html>
