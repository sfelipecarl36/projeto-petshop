<?php
if (isset($_SESSION['email'])):
?>

<script type="text/javascript">
	function logoutSuccess() {
		window.alert("Sua sessão expirou.");
	 	window.location.assign("logout.php");
	}
	 
</script>

<script type="text/javascript">
	var logout = setInterval(logoutSuccess,1300000);

	function logoutStop() {
		clearInterval(timer);
		timer = null;
	}

	function logoutStart() {
		logoutStop();
		timer = setInterval(logoutSuccess,1300000);
	}
</script>

<?php endif; ?>