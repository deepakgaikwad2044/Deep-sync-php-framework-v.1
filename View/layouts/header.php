
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deep-Sync-PHP-Framework</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  
<link rel="icon" href="/public/favicon/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<!------sweet alert--->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js" integrity="sha512-OlF0YFB8FRtvtNaGojDXbPT7LgcsSB3hj0IZKaVjzFix+BReDmTWhntaXBup8qwwoHrTHvwTxhLeoUqrYY9SEw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!------datatable--->
<link href="https://cdn.datatables.net/v/bs4/dt-2.1.6/b-3.1.2/b-html5-3.1.2/r-3.0.3/sc-2.4.3/sp-2.3.2/datatables.min.css" rel="stylesheet">
 
<script src="https://cdn.datatables.net/v/bs4/dt-2.1.6/b-3.1.2/b-html5-3.1.2/r-3.0.3/sc-2.4.3/sp-2.3.2/datatables.min.js"></script>

    <!-- Toastr CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    
    <!-- Toastr JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
     <!-- Select2 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
      rel="stylesheet"
    />

    <!-- Select2 Bootstrap 4 Theme -->
    <link
      href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css"
      rel="stylesheet"
    />
   
<style>

:root{
  --darkmode:#dbcbfa;
  --lightmode:#824be9;
  --lightmode:#eeeaea;
  --brand-color:#b2af00;/* select */
--second-color :#8362c4;
--second-color :#6a29e7;
  
}

html {
  user-select: none;
}


.btn-primary , .btn-dark {
  padding:.5rem 2.5rem;
  outline: none;
  border: none;
  background: var(--second-color);
}

.fa-arrow-left {
  color:#333;
}
.btn-dark {
  background:#131010;
}

.change_password_text{
  color: var(--second-color);
  margin-bottom: 1rem;
}

.res_img{
  width:200px;
  height:200px;
  background: red!important;
}

.card .btn{
  background:#8362c4;
  text-transform:uppercase;
  font-weight:bold;
  border:none;
  
  &:hover{
    background:#fff;
    color:#909090;
  }
  
}

  .body_darkmode {
    background: #333!important;
    background: #4E515C!important;
    background: #1b1917!important;
    color: #f3f3f3!important;
    color: #f3f3f3!important;
  }
     
.dashboard_heading{
  font-size: 1rem;
      color: #333!important;
      text-align:left;
      margin-left:1rem;
}

  i {
    font-size:2.1rem;
  }
  
  label {
    font-weight:700;
  }
  
 .brand_logo {
   background:cover;
   box-shadow: 0 .1rem .2rem rgba(0,0,0,.2);
 } 
 
 .sidenav {
  position:fixed;
  transform:translateX(-100%);
  transition: all .30s linear;
  opacity: .2;
 }
 
 .expand_nav {
  transform:translateX(-5%);
  opacity: 1;
 }
 
 .fas{
   font-size:2rem;
 }
 
 .user_profile{
   width:2.4rem;
   aspect-ratio: 1;
   border-radius:50%;
   object-fit: cover;
 }
 
 .username {
   font-size:1rem;
 }
 
 .btn {
   text-transform:capitalize;
 }
 
 .top_navbar{
   background: #fff;
 }

  .sidenav{
   background:#fcfbfb;
   z-index:3;
   & a {
   color:#110d0d!important;    
    
  }

  & .nav-item{
      transition: all .5s linear;
       color: #333;
       margin-bottom:1.5rem;
     
  &:hover{
   background:rgba(200,200,200,.2);
   background:rgba(10,10,10,.1);
   font-weight:bold;
 }
 
  }
 
 }
 
  }
 
 
 

 li{
   margin-bottom:.5rem;
 }
 
 .logout{
   margin:.5rem 0;
   border-top:2px solid #333;
 }
 

  body{
    background:#FAF8F6;
    color: #545454!important;
  }
  
</style>

<?php  use App\Config\Auth;
if(isset($_SESSION['user_id'])){
  $user = Auth::user();
}
?>

</head>
<body>
  