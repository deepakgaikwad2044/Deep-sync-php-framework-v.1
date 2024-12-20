<?php includes("layouts.header"); ?>

<div class="">
    <!-- Sidebar -->
<?php includes("layouts.sidemenu"); ?>
  
    <!-- Main Content -->
    <div class="flex-grow-1">
      
        <!-- Top Navbar -->
 <nav class="navbar navbar-expand-lg  top_navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <img src="/public/brands/logo1.png" width="50px" height="50px" class="img-fluid rounded-circle brand_logo"/></a>

                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center mr-3 p-2">
     <img class="img-fluid user_profile rounded-circle" src="<?php echo 
       $user["avtar"]; ?>" alt="User Avatar"  />
  
 <p class="username mb-0 ml-2">
    <?php
    // Corrected condition
    $name = $user['name'];
     shortname($name);
    ?>
</p>

                    </div>
                    <i class="fas fa-bars bars_icon"> </i>                    
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
   
  
</div>

<?php includes("layouts.footer"); ?>

<?php if(isset($_SESSION['success'])){?>
  
  <script>
$(document).ready(function(){
            
     toastr.success('<?php echo $_SESSION["success"]; ?>', 'Success');
          
        });
        </script> <?php
        unset($_SESSION["success"]);
  
    } ?>