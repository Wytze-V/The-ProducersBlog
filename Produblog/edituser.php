<?php
 require_once('assets/includes/include.php');
 //Hier wordt het id van de gebruiker meegenomen van de vorige pagina naar deze pagina.
 $id = $_GET["id"];

//Hier word gecontroleerd of de gebruiker is ingelogd en of de gebruiker admin is anders geen toegang
  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
	  //hier definiëren wij dat variable gebruiker de functie getProfileA moet uitvoeren met het meegegeven id
		    $gebruiker = getProfileA($id);  
        echo"<div class='login-page'>
                <h3 class='font' >Profiel van ".html($gebruiker->username)."</h3>
                <hr class='hr'>
                <div class='form'>
                    <form class='register-form' method='POST' action='ac_user.php'>
                        <div class='caption loginText'>
							<input type='hidden' name='id' value='".html($gebruiker->idUsers)."' >
                            <label>Gebruikersnaam</label>
                            <input class='form__field' name='username' value='".html($gebruiker->username)."' >
                            </br>
                            <label>Email</label>
                            <input class='form__field' name='email' value='".html($gebruiker->email)."'>
                            </br>
                            <label>Usertype</label>
							<select class='form__field' name='usertype' value='".html($gebruiker->usertype)."'>
								<option value='gebruiker'>gebruiker</option>
								<option value='producer'>producer</option>
								<option value='admin'>admin</option>
							</select>
							</br>
                            </br>
                            <input class='insert_btn' type='submit' value='Wijzig'  name='UpdateA'>
                        </div>
                    </form>
                </div>
            </div>";
	}else{
		echo"
		you do not have access to this page
		<h3 class='loginText'><a class='loginText' href='home.php'>Go home</a></h3>";
	}
?>


<?php include_once('assets/includes/footer.php'); ?>