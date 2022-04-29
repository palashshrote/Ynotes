<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['note_title'];
        $desc = $_POST['note_description'];

        $servername = "localhost";
        $username = "root";
        $password = "password";
        $database = "notes";

        $conn = mysqli_connect($servername, $username, $password, $database);
        if(!$conn){
            die("Connection failed <br>" . mysqli_connect_error());
        }
        else{
            // $sql = "INSERT INTO `note` (`title`, `desc`) VALUES (`$title`, `$desc`);";
            $sql = "INSERT INTO `note` (`title`, `desc`,`tstamp`) VALUES ('$title', '$desc', CURRENT_TIMESTAMP);";

            $result = mysqli_query($conn, $sql);
            if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5>Your entry has been submitted successfully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'; 
                }
                else{
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>We are facing some technical issues and your entry has not submitted successfully</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'; 
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>