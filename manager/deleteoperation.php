<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    $sql = "DELETE FROM operation_tb WHERE operation_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
            {
                ?>
                <script>
                alert ("Deleted Successfully");
                window.location.href="operation.php";
                </script>
                <?php

            
            }
            ?>