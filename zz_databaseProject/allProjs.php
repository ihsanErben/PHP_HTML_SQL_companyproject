<html>
    <head>
        <title>All Projects</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $query = "SELECT pnumber,pname FROM project order by pnumber";
        $result = mysqli_query($conn,$query);        
        mysqli_close($conn);
        ?>

        <h4>Projects of Company</h4>
        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">Project Number</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
            </tr>

            <?php
            $i = 0;
            while ($row= mysqli_fetch_assoc($result)) {
                $pnum = $row["pnumber"];
                $pname = $row["pname"];
                ?>

                <tr>
                    <td><font face="Arial, Helvetica, sans-serif">
                        <a href="projView.php?pnum=<?php echo $pnum; ?>"><?php echo $pnum; ?></a></font></td>
                    <td><font face="Arial, Helvetica, sans-serif"><?php echo $pname; ?></font></td>
                </tr>

                <?php
                $i++;
            }
            ?>

        </table>

        <P>
            <a href="./">Return to main page</a>

    </body>
</html>
