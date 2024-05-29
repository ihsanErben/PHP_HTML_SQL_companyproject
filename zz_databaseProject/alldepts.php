<!DOCTYPE html>
<html>
    <head>
        <title>All Departments</title>
    </head>
    <body>

        <?php
        include "./dbconnect.php";
        $sql = "select dnumber,dname FROM department order by dnumber";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        mysqli_close($conn);
        ?>

        <h4>Departments of Company</h4>
        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th>Department Number</th>
                <th>Department Name</th>
            </tr>

            <?php
            $i = 0;
            while ($row= mysqli_fetch_assoc($result)) {  //retrieve a tuple
                $dno = $row["dnumber"];
                $dname = $row["dname"]
                ?>
                <tr>
                    <td>
                        <a href="deptView.php?dno=<?php echo $dno; ?>"><?php echo $dno; ?></a>
                    </td>
                    <td><?php echo $dname; ?></td>
                </tr>

                <?php                
            }
            ?>

        </table>

        <P>
            <a href="./">Return to main page</a>

    </body>
</html>
