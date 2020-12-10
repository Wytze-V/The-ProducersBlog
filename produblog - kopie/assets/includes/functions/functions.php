<?php

function isAdmin()
{
	if (isset($_SESSION['idUsers']) && $_SESSION['idUsers']['usertype'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
?>