<?php includes("layouts.header");  ?>
<div class="container my-5">
 <div class="row justify-content-center">
   <div class="col-sm-10">
     
  <h2 class="my-5">Register Now</h2>
  <form action="submit-register" method="post">
   
   <?php if(isset($_SESSION["data"])){
   $TempData =  $_SESSION['data'];
  
   }?>
   
<?php require_once("view/alert/msg.php"); ?>
    <div class="form-group">
      <label for="name">Name:</label>
 <input type="text" class="form-control" id="name" placeholder="sushil kumar" value="<?php echo isset($TempData['name']) ? $TempData['name'] : ""  ?>" name="name" required="">
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="sushi@gmail.com" value="<?php echo isset($TempData['email']) ? $TempData['email'] : ""  ?>" name="email" required="">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required="">
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary mr-3">sign up</button>
    
    <a href="login" class="btn btn-dark">login</a>
  </form>
  </div>
  </div>
</div>

<?php includes("layouts.footer");  ?>
