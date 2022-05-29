<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    $sql = "DELETE FROM staff_tb WHERE staff_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
            {
                ?>
                <script>
                alert ("Deleted Successfully");
                window.location.href="staffs.php";
                </script>
                <?php

            
            }
            ?>