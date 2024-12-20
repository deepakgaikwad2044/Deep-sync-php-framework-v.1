<?php includes("layouts.header");  ?>

<?php if(isset($_SESSION['pass_match'])){
unset($_SESSION['pass_match']);
} ?>
<div class="container my-5">
 <div class="row justify-content-center">
   <div class="col-sm-10">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
 
  <a href="/dashboard">
    
     <i class="fas fa-arrow-left"></i>
  </a>
 
   <h4 class="ml-3">Edit Profile</h4>
    </div> 
   
  <form action="/profile/update" method="post" enctype="multipart/form-data">
    
<?php require_once("view/alert/msg.php"); ?>
    
        <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="sushil kumar" value="<?php echo $user['name']; ?>" name="name" >
    </div>
    
    <div class="form-group">
      <label for="profile">Profile:</label>
      <input type="file" class="form-control" accept="image/jpeg,jpg,png" id="profile"  name="profile">
    </div>
   
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="sushi@gmail.com" 
      value="<?php echo $user['email']; ?>" name="email" >
    </div>
  
 <a href="/user-password-edit"> <h6 class="change_password_text text-right">change password</h6> </a>
    
    <button type="submit" name="submit" class="btn btn-primary">update</button>
  
  </form>
  </div>
  </div>
</div>

<?php includes("layouts.footer");  ?>
