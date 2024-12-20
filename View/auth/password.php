<?php includes("layouts.header");  ?>

<div class="container my-5">
 <div class="row justify-content-center">
   <div class="col-sm-10">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
 
  <a href="/profile/edit">
    
     <i class="fas fa-arrow-left"></i>
  </a>
 
   <h4 class="ml-3"> Change Password</h4>
    </div> 

<?php require_once("view/alert/msg.php"); 
?>


  <?php if(!isset($SESSION['pass_match']) 
  
  ) { 

  ?> 
  <form action="/user-password-verify" method="post" enctype="multipart/form-data">
    
    
   <div class="form-group">
      <label for="cpass">Current Password:</label>
    <input type="text" class="form-control" id="cpass" 

    value="<?php echo isset($_SESSION['pass_match']) ? 
   "******"  : ""; ?>"  name="cpass" 
<?php echo isset($_SESSION['pass_match']) ? 'disabled' : ''; ?>

   
   required="" >
   
    </div>
  
    <button type="submit" name="submit" class="btn btn-primary" <?php echo isset($_SESSION['pass_match']) ? 'disabled' : ''; ?> >
      <?php echo isset($_SESSION['pass_match']) ? 'verified' : 'verify'; ?>
      </button>
  
  </form>
<?php } ?>
  

  <?php if(isset($_SESSION['pass_match'])){ ?>
  <form action="/user-password-update" method="post" class="mt-3" enctype="multipart/form-data">
    
   <div class="form-group">
      <label for="npass">New Password:</label>
      <input type="text" class="form-control" id="npass"  name="npass" >

    </div>

    <button type="submit" name="submit" class="btn btn-primary">update</button>
  
  </form>
      <?php } ?>
  
  </div>
  </div>
</div>

<?php includes("layouts.footer");  ?>
