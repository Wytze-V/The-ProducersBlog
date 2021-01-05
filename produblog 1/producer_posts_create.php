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

    <?php

    //if form has been submitted process it
    if(isset($_POST['submit'])){

 

        //collect form data
        extract($_POST);

        //very basic validations
        if($postname ==''){
            $error[] = 'Please enter the title.';
        }

        if($postcontent ==''){
            $error[] = 'Please enter the content.';
        }

        if(!isset($error)){

          try {



    //insert into database
  // $stmt = $db->prepare('INSERT INTO techno_blog (articleTitle,articleDescrip,articleContent,articleDate) VALUES (:articleTitle, :articleDescrip, :articleContent, :articleDate)') ;
  $stmt = $con->prepare('INSERT INTO post (postname,postcontent,date) VALUES (:postname, :postcontent, :date)') ;



$stmt->execute(array(
    ':postname' => $postname,
    ':postcontent' => $postcontent,
    ':date' => date('Y-m-d H:i:s'),
    
));
//add categories
 


    //redirect to index page
    header('Location: home.php');
    exit;

}catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo '<p class="message">'.$error.'</p>';
        }
    }
    ?>

 <form action="" method="post">

        <h4><label>Article Title</label><br>
        <input type="text" name="postname" style="width:100%;height:40px" value="<?php if(isset($error)){ echo $_POST['postname'];}?>"></h4>

      <!-- <h4><label>Short Description(Meta Description) </label><br>
        <textarea name="articleDescrip" cols="120" rows="6"> <?php// if(isset($error)){ echo $_POST['articleDescrip'];}//?></textarea></h4> -->

        <h4><label>Long Description(Body Content)</label><br>
        <textarea name="postcontent" id="textarea1" class="mceEditor" cols="120" rows='20'><?php if(isset($error)){ echo $_POST['postcontent'];}?></textarea></h4>
        

       
        <button name="submit" class="subbtn">Submit</button>


    </form>
	
</div>

</div>
