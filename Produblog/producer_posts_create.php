<?php

require_once('assets/includes/include.php');

$con = getDBConnection();

if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'producer'){
	
}else{
	header('location: home.php');
}
?>
<div class="postcre">
<!-- On page head area--> 
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script>
          tinymce.init({
             mode : "specific_textareas",
    editor_selector : "mceEditor",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>


<div class="content">
 
    <h2>Add New Article</h2>


 <form action="action/ac_post.php" method="post">

        <h4><label>Article Title</label><br>
        <input type="text" name="postname" style="width:100%;height:40px" value="<?php if(isset($error)){ echo $_POST['postname'];}?>"></h4>

      <!-- <h4><label>Short Description(Meta Description) </label><br>
        <textarea name="articleDescrip" cols="120" rows="6"> <?php// if(isset($error)){ echo $_POST['articleDescrip'];}//?></textarea></h4> -->

        <h4><label>Long Description(Body Content)</label><br>
        <textarea name="postcontent" id="textarea1" class="mceEditor" cols="120" rows='20'><?php if(isset($error)){ echo $_POST['postcontent'];}?></textarea></h4>
        
       
        <input class= 'insert_btn' type='submit' value='Sla post op!' name='Insert'>


    </form>
	
</div>

</div>
