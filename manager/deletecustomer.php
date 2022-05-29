<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    $sql = "DELETE FROM cust_tb WHERE cust_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
            {
                ?>
                <script>
                alert ("Deleted Successfully");
                window.location.href="customers.php";
                </script>
                <?php

            
            }
            ?>