<?php
includes("layouts.header");
?>

<div class="container my-5">
 <div class="row justify-content-center">
   <div class="col-sm-10">
     
  <h2 class="my-5">Login Now</h2>
  <?php require_once("view/alert/msg.php"); ?>
  <form action="submit-login" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" value="<?php echo isset($_SESSION['email']) ?  $_SESSION['email'] : "" ?>" id="email" placeholder="Enter email" name="email" required="">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required="">
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary mr-3">Submit</button>
     <a href="register" class="btn btn-dark">register</a>
  </form>
  </div>
  </div>
</div>

<?php
includes("layouts.footer");
?>
