<?php
session_start();

echo'
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://dkforum.herokuapp.com/">DKForum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
        <li></li>
       
      </ul>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo'
        <form class="d-flex" style="padding-right: 10px;" action="search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
       <a href="partials/_logout.php" role="button" class="btn btn-outline-success" type="submit">LOGOUT</a>';
      }
      else{
        echo'
        <form class="d-flex" style="padding-right: 10px;" action="search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <button style="padding-right: 10px;" class="btn btn-outline-success" type="submit"  data-bs-toggle="modal" data-bs-target="#loginModal">login</button>
      <button style="padding-right: 10px;" class="btn btn-outline-success" type="submit" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
      }
      

       echo '</div>
  </div>
</nav>';


$id = isset($_GET['$showError']);
 include 'partials/_loginModal.php';
 include 'partials/_signupModal.php';
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
 echo'
 <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS!</strong> Signed Up successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 ';
 }
