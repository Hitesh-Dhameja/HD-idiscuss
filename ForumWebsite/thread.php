<?php
    include 'partials/_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $ques = $_POST['question'];
        $quesdesc = $_POST['quesDesc'];
        $name = $_GET['name'];
        $username = $_SESSION['username'];
        $sql = "INSERT INTO `threads` (`sr.no.`, `thread_name`, `ques_heading`, `ques_desc`, `username`, `Time`) VALUES (NULL, '$name', '$ques', '$quesdesc', '$username', current_timestamp());";
        $result1 = mysqli_query($conn,$sql);
    }
    
?>
<!doctype html>
<html lang="en">

<head>
    <link href="index.css" rel="stylesheet" type="text/css" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>iDiscuss-For Everyone!</title>

    <style>
    .above-footer {
        top: 2rem;
        border-top: 2px solid rgb(187, 185, 185);
    }

    .above-footer p {
        margin-left: 25rem;
        font-size: 2rem;
        margin-top: 1rem;
    }

    .above-footer p span {
        font-weight: bold;
    }

    .above-footer form {
        margin-left: 23rem;
    }

    .above-footer form input {
        width: 22rem;
        height: 2.5rem;
        border-color: whitesmoke;
        border-radius: 10px;
    }

    .above-footer form button {
        margin-top: 2rem;
        height: 2.5rem;
        width: 10rem;
        color: whitesmoke;
        background-color: blue;
        border-radius: 10px;
    }

    .icons-above-footer {
        margin-top: 2rem;
        margin-left: 31rem;
        margin-bottom: 1rem;
        display: inline-flex;
    }

    .icons-above-footer .icon-foot i {
        color: blue;
        margin-left: 1rem;
    }

    .footer {
        bottom: 0;
        width: auto;
        background: black;
    }

    .footer-inside {
        display: inline-flex;
        color: whitesmoke;
    }

    .foot {
        margin-left: 2rem;
        margin-top: 2rem;
    }

    .foot pre {
        margin-top: 2rem;
        color: whitesmoke;
    }

    .foot h6 {
        margin-top: 1rem;
    }

    /* .foot-cat{
    margin-left: 3rem;
    margin-top: 2rem;
} */
    .foot ul {
        margin-top: 2rem;
        list-style: none;
    }

    .foot li {
        margin-top: 1rem;
    }

    .foot h3 {
        margin-left: 1rem;
    }

    .copyright {
        padding: 0;
        display: inline-flex;
        color: whitesmoke;
        margin-left: 25rem;
        margin-top: 5rem;
    }

    .passinput {
        margin-left: 2.2rem;
    }

    .formcheck1 {
        margin-left: -2rem;
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
        include 'partials/_dbconnect.php';
        include 'partials/_header.php'
    ?>

    <div class="container my-3 add">
        <?php 
            $id = $_GET['id'];
            $sql = "SELECT * FROM `categories` where category_id=$id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            echo'
            <div class="jumbotron">
            <h1 class="display-4">Welcome to '. $row["category_name"] .' Forum!</h1>
            <p class="lead">'.$row["category_description"].'</p>
            <hr class="my-4">
            <h6>Forum Rules:</h6>
            <p>No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Do not PM users asking for help. Remain respectful of other members at all times.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>'
        ?>

    </div>

    <?php
        if(isset($_SESSION["loggedin"])){
            echo'<div class="container">
            <h3>Start a Discussion</h3>
            <form method="POST" action="'.$_SERVER['REQUEST_URI'].'">
                <div class="form-group">
                    <label for="exampleInputEmail1">Problem Title</label>
                    <input type="text" name="question" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Keep your problem title short</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ellaborate your Concern</label>
                    <textarea class="form-control" name="quesDesc" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>';
        }
        else{
            echo'<div class="container my-3">
                    <div class="jumbotron bg-warning">
                        <h4 class="display-5 text-danger">Please Login to take the discussion ahead!</h4>
                    </div>
                </div>';
        }
    ?>



    <div class="container my-3">
        <h2>Browse Questions</h2>
        <?php
            include 'partials/_dbconnect.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM `categories` where category_id=$id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $threadname = $row["category_name"];
            $sql2 = "SELECT * FROM `threads` WHERE thread_name ='$threadname'";
            $result1 = mysqli_query($conn,$sql2);
            $num = mysqli_num_rows($result1);
            if($num==0){
                
                echo'<div class="jumbotron">
                <h1 class="display-4">No Results Found!</h1>
                <p class="lead">Be the first to Ask Question...</p>
                
              </div>';
            }
            else{
                while($row = mysqli_fetch_assoc($result1)){
                    $question = $row['ques_heading'];
                    $quesdesc = $row['ques_desc'];
                    $id1 = $row['thread_id'];
                    $time = date("g:i a F j, Y ", strtotime($row['Time']));
                    echo'<div class="media my-3">
                    <img src="https://simg.nicepng.com/png/small/128-1280593_computer-user-icon-img-users.png" width="54px" class="mr-3" alt="abc">
                    <div class="media-body">
                        <h5 class="mt-0"> <a class="text-dark" href="/ForumWebsite/threadQues.php?id1='.$id1.'&time='.$time.'">'.$question.'</a></h5>
                        <p class="time">Posted on '. $time .'</p>
                        <p>'.$quesdesc.'</p>
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