<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    $sql = "DELETE FROM work_tb WHERE work_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
            {
                ?>
                <script>
                alert ("Deleted Successfully");
                window.location.href="work.php";
                </script>
                <?php

            
            }
            ?>