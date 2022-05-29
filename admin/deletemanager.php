<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    $sql = "DELETE FROM manager_tb WHERE manager_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
            {
                ?>
                <script>
                alert ("Deleted Successfully");
                window.location.href="managers.php";
                </script>
                <?php

            
            }
            ?>