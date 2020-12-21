<?php include './requirements.php'  ?>
<div class="row">
    <div class="col-sm-4">
        
    </div>
     <div class="col-sm-4">
    <form class="needs-validation" method="POST" action="./editpic1.php" enctype="multipart/form-data" class="form">     
        <label for="country">Main picture</label>
            <input type="file" name="pic1"  class="form-control">
            <input type="text" name="idd" value="<?php echo $_GET['idd']; ?>" hidden>
            <div class="invalid-feedback">
              Please select a valid material.
            </div>
          <button class="btn btn-secondary btn-lg d-flex justify-content-center" type="submit" name="submit"><small>SUBMIT</small></button>
    </form>      
    </div>
    <div class="col-sm-4">
        
    </div>
</div>    
<?php
if(isset($_POST['submit'])){
    include_once './database/connection.php';
  $businessId = "1";  
    $product_id = $_POST['idd'];
  //pic1
  $filetmp1=$_FILES["pic1"]["tmp_name"];
  $filename1=basename($_FILES["pic1"]["name"]);
  $filepath1="./assets/images/".$filename1;
  move_uploaded_file($filetmp1,$filepath1); 
 
  
  
  $sql="UPDATE `products` SET `pic1`='$filepath1' WHERE `product_id` = '$product_id'";
  $exec = mysqli_query($connection,$sql);
  if($exec){
       
    header("location:productEdit.php?data=$product_id");   
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('YOUR POST WAS NOT POSTED SUCCESSFULLY!')";
        echo "</script>";
        echo "<a href='adminDashboard.php'>";
        echo "Go back";
        echo "</a>";
    }
}
  ?>
