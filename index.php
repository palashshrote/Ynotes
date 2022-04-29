<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "notes";
    $insert = false;

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("Connection failed<br>" . mysqli_connect_error());
    }

    // echo "if($_SERVER['REQUEST_METHOD'] == 'POST')";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['note_title'];
        $desc = $_POST['note_description'];

        $sql = "INSERT INTO `note` (`title`, `desc`,`tstamp`) VALUES ('$title', '$desc', CURRENT_TIMESTAMP);";

        $result = mysqli_query($conn, $sql);
        $insert = true;
            
    }
    // $sql = "CREATE TABLE `note`(`s_no` INT(6) NOT NULL AUTO_INCREMENT, `title` VARCHAR(30) NOT NULL, `desc` TEXT, `tstamp` DATETIME, PRIMARY KEY(`s_no`))";
    // $sql = "INSERT INTO `note` (`title`, `desc`,`tstamp`) VALUES ('Go and play', 'Take a shower for recovery after finishing the game', CURRENT_TIMESTAMP)";

    // $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1 - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container mt-2 ">
            <a class="navbar-brand" href="#"><h3>iNotes</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page"  href="#">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page"  href="#">Contact Us</a>
                </li>
               
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    
    <?php
        if($insert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5>Note has been inserted successfully</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'; 
        }
        else{
            // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            // <p>We are facing some technical issues and your entry has not submitted successfully</p>
            // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>'; 
        }
    ?>

    <div class="container mt-4">
        <h2>Add a note</h2>
        <!-- <br> -->
        <form action="/code_php/32_crud/index.php" method="post">
            <div class="mb-3">
                <label for="note_title" class="form-label">Note title</label>
                <input type="text" class="form-control" id="note_title" name="note_title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="note_description" class="form-label">Note descrription</label>
                <textarea class="form-control" name="note_description" id="note_description" cols="30" rows="5"></textarea>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Add note</button>
        </form>
        <br>
        
        <div class = "container my-4">
            <table id="myTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col">S_no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `note`";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $sno++;
                            echo "<tr>
                            <th scope='row'>". $sno. "</th>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['desc'] . "</td>
                            <td> Actions </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    
</body>
</html>