<style>
   .sidenav {
     box-shadow: 0 .2rem .2rem rgba(0,0,0,.5);
   }
 </style>
 
 <div class="sidenav_container">
    <nav class="container-fluid  sidenav p-3" style="width: 250px; height: 100vh;">
  
 <div class="first_div text-center mt-3">
     
  </div>
  
  
  <ul class="nav flex-column p-3 mt-3">
  
 <!-- menu  Link -->

  
    <li class="nav-item ">
      <div class="d-flex align-items-center">
<span class="material-symbols-outlined ">account_circle</span>
    <a href="/profile/edit" class="nav-link " 
      >profile</a>
      </div>
    </li>
    <li class="nav-item logout">
      <div class="d-flex align-items-center">
        <span class="material-symbols-outlined text-danger">logout</span>
    <a href="logout" class="nav-link logout_btn" 
      >Logout</a>
      </div>
    </li>

  </ul>
  
</nav>
 </div>

<script>
  $(document).ready(function(){
    // set defalut api 
    $(".logout_btn").click(function(){
      let d  = localStorage.removeItem('selectedAPI')
    })
    
  });
  
</script>

   