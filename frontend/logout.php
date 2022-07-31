<?php
session_start();

unset($_SESSION['sess_session_id']);
unset($_SESSION['sess_cusname']);
unset($_SESSION['sess_log_username']);
unset($_SESSION['sess_user_type']);
unset($_SESSION["sess_cusstatus"]);

session_destroy();
?>
<script language="JavaScript">
    window.open("index.php", "_parent");
</script>