<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Welcome to iSolution - coding forums</title>
    <style>
    /* .container {
        background: url(contactus.jpg);
        background-size: cover;
        max-width: 100%;
    } */

    .form-control {
        width: 64%;
    }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>


    <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone_no = $_POST['phone'];
    $message = $_POST['message'];


    $sql = "INSERT INTO `contactus` (`email_id`, `name`, `phone no`, `message`, `dt`) VALUES ('$email', '$name', '$phone_no', '$message', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
        
        echo '
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Success!</strong> Your message has been added! Please wait when someonefor comunity to respond.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
   
           }
   }

?>

    <div class="container">
        <h3 class="text-center mt-4">Contact Us</h3><hr>
        <form action="/forum/contact.php" method="post" class="mx-4">
            <div class="modal-body">
                <div class="mb-2">
                    <label for="loginEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-label">Phone no</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-2">
                    <!-- <label for="message" class="form-label">message</label> -->
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <?php include 'footer.php';?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>