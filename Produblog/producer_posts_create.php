<?php

require_once('assets/includes/include.php');

//Hier word gecontroleerd of de gebruiker is ingelogd en of de gebruiker producer of admin is anders geen toegang
if(isset($_SESSION['usertype']) && ( ($_SESSION['usertype'] == 'producer')  or ($_SESSION['usertype'] == 'admin') ) ){
	
}else{
	header('location: home.php');
}
?>
<div class="postcre">


<div class="content">
 
    <h2>Creëer nieuw artikel</h2>


 <form action="ac_post.php" enctype="multipart/form-data" method="post">

        <h4><label>Titel</label><br>
        <input type="text" name="postname" style="width:100%;height:40px" value="<?php if(isset($error)){ echo $_POST['postname'];}?>"></h4>

		Audio bestanden uploaden:
		<input type="file" name="fileToUpload" id="fileToUpload">
		
        <h4><label>Post Inhoud</label><br>
        <textarea name="postcontent" id="textarea1" class="mceEditor" cols="120" rows='20'><?php if(isset($error)){ echo $_POST['postcontent'];}?></textarea></h4>
        
		<?php
		if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
		echo'
        <input type="checkbox" name="mainpost" value="1" >
		<label for="Mainpost">Posten op hoofd pagina</label><br>

		';
		}
		?>
		
        <input class= 'insert_btn' type='submit' value='Sla post op!' name='Insert'>


    </form>
	
</div>

</div>

<?php include_once('assets/includes/footer.php'); ?>

