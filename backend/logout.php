<?php
session_start();

unset($_SESSION['sess_session_id']);
unset($_SESSION["sees_em_id"]);
unset($_SESSION['sess_emname']);
unset($_SESSION['sess_em_username']);
unset($_SESSION["sess_em_degree"]);
unset($_SESSION['sess_em_status']);

session_destroy();
?>
<script language="JavaScript">
    window.open("login.php", "_parent");
</script>