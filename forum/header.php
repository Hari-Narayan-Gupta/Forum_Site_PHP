<?php include 'dbconnect.php'; ?>
<?php

session_start();
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">iSolution</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
         echo '<li><a class="dropdown-item" href="/forum/threadlist.php?catid='. $row['category_id'] .'">'. $row['category_name'] .'</a></li>';
          
}

      echo' </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php">Contact</a>
      </li>
    </ul>
    <div class="mx-2">';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
         echo   '<form class="d-flex"  method="get" action="search.php">
                   
                   <p class="text-light my-0 mx-2">Welcome ' . $_SESSION['username'] . '</p>
                   <a href="/forum/logout.php" class="btn btn-outline-success btn-sm">Logout</a>
                 </form>';
    }
else {
  echo '
      <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
       </div> 
       <form class="d-flex"  method="get" action="search.php">
       <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
       </div>
';
}

echo '</div>
      </nav>';


include 'loginModal.php';
include 'signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
     echo '<div class="alert alert-success alert-dismissinle fade show my-0" role="alert">
     <strong>Success!</strong>You can login.......
     <button type="button" class"close" data-dismiss="alert" aria-lable="close">
     <span aria-hidden="true">&times;</span>
     </button>
     </div>';
}
?>

<!-- // <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    // <button class="btn btn-outline-success" type="submit">Search</button> -->