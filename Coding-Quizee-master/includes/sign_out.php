<?php
      session_start();
      session_destroy();
      header("Location: ../index.php?success=logged_out");
      exit();
?>
