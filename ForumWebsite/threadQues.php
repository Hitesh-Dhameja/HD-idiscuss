<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }
    include 'partials/_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $quesans = $_POST['quesanswer'];
        $quesName = $_GET['ques'];
        $username = $_SESSION['username'];
        $sql = "INSERT INTO `threaddiscuss` (`Sr.no.`, `threadQues`, `username`, `threadAns`, `Created_Time`) VALUES (NULL, '$quesName', '$username', '$quesans', current_timestamp());";
        $result1 = mysqli_query($conn,$sql);
    }
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>iDiscuss-For Everyone!</title>
    <link rel="stylesheet" href="index.css">
    <style>
    .footer {
        bottom: 0;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .add {
        min-height: 500px;
    }

    .time {
        font-size: 10px;
        padding-bottom: 0;
        margin-bottom: 0;
        bottom: 0;
        margin-top: 0;
        padding-top: 0;
    }
    </style>
</head>

<body>
    <?php
        include 'partials/_header.php'
    ?>
    <div class="container my-3 add">
        <?php 
            include 'partials/_dbconnect.php';
            $id = $_GET['id1'];
            $sql = "SELECT * FROM `threads` where thread_id=$id";
            $result2 = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result2);
            $time = $_GET['time'];
            $question = $row['ques_heading'];
            $quesdesc = $row['ques_desc'];
            echo'
            <div class="jumbotron">
            <h1 class="display-4">'. $question .'</h1>
            <p class="lead">'.$quesdesc.'</p>
            <p class="lead">Posted on '.$time.'</p>
            <hr class="my-4">
            <h6>Forum Rules:</h6>
            <p>No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Do not PM users asking for help. Remain respectful of other members at all times.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>';
        ?>

    </div>

    <?php
        if(isset($_SESSION["loggedin"])){
            echo'<div class="container">
                    <h3>Leave a Reply</h3>
                    <form method="POST" action="'.$_SERVER['REQUEST_URI'].'">
                        <div class="form-group">
                            <textarea class="form-control" name="quesanswer" placeholder="Enter your comment here" name="quesDesc" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>';
        }
        else{
            echo'<div class="container my-3">
                    <div class="jumbotron bg-warning">
                        <h4 class="display-5 text-danger">Please Login to Post a comment!</h4>
                    </div>
                </div>';
        }
    ?>

    <div class="container my-4">
        <h2>Discussions</h2>
        <?php
            include 'partials/_dbconnect.php';
            $id = $_GET['id1'];
            $time = $_GET['time'];
            $sql = "SELECT * FROM `threads` WHERE thread_id ='$id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $ques = $row['ques_heading'];
            $sql2 = "SELECT * FROM `threaddiscuss` WHERE threadQues='$ques'";
            $result2 = mysqli_query($conn,$sql2);
            $num = mysqli_num_rows($result2);
            if($num==0){
                
                echo'<div class="jumbotron">
                <h1 class="display-4">No Results Found!</h1>
                <p class="lead">Be the first to Answer...</p>
                
              </div>';
            }
            else{
                while($row = mysqli_fetch_assoc($result2)){
                    $username = $row['username'];
                    $quesans = $row['threadAns'];
                    $time = date("g:i a F j, Y ", strtotime($row['Created_Time']));
                    echo'<div class="media my-3">
                    <img src="https://simg.nicepng.com/png/small/128-1280593_computer-user-icon-img-users.png" width="54px" class="mr-3" alt="abc">
                    <div class="media-body">
                        <h5 class="mt-0">'.$username.'</h5>
                        <p class="time">Posted on '.$time.'</p>
                        <p>'.$quesans.'</p>
                    </div>
                    </div>';
                }
            }
            
        ?>
    </div>


    <?php
        include 'partials/_footer.php'
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>