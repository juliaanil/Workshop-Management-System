<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    $sql = "DELETE FROM part_tb WHERE work_id='".$_GET["requestid"]."'and part_id='".$_GET['part_id']."'";
			if($db->query($sql) == TRUE)
            {
                ?>
                <script>
                alert ("Deleted Successfully");
                window.location.href="tasks.php";
                </script>
                <?php

            
            }
            ?>