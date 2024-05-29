<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Simple Database Access</title>
    </head>
    <body>
        <h4>Department Details</h4>
        <?php
        include './dbconnect.php';
        $dnumber = $_POST['dnumber'];  
         
        echo "department number: ".$dnumber."<br>";
        $mgrquery = "SELECT D.mgrssn, E.fname,E.minit, E.lname, dname FROM department D, employee E where D.dnumber=$dnumber and D.mgrssn=E.ssn";
        $mgrResult= mysqli_query($conn,$mgrquery);        
        $nummgr = mysqli_num_rows($mgrResult);
        
       $managerOfDept=""; 
        if($nummgr!=0){
            echo "<br>";
            $managerOfDept = mysqli_fetch_assoc($mgrResult); //no more than one manager, no need to have loop.
            $dname = $managerOfDept["dname"];
            $mgrofdept = $managerOfDept["mgrssn"];
            $fname = $managerOfDept["fname"];
            $minit = $managerOfDept["minit"];
            $lname = $managerOfDept["lname"];         
            
            echo "<br>Manager of $dname Department  ";
            echo $fname,"\t",$minit,"\t", $lname,"<br>"; 
        }
        else{
            echo "No manager is appointed for this department.<br>";
        }
                        
        
        $empquery = "select * from employee where dno ='$dnumber' and ssn!='$mgrofdept'";
        $empsofdept = mysqli_query($conn,$empquery);
        
        mysqli_close($conn);
        
        
        
        
       echo "<br>Employees of $dname Department: <br>"; 
        while($row= mysqli_fetch_assoc($empsofdept)){      
            $fname = $row["fname"];
            $minit = $row["minit"];
            $lname = $row["lname"];                                   
            echo "<b>",$fname,"\t",$minit,"\t", $lname,"</b><br>";                        
        }
        ?>
    </body>
</html>