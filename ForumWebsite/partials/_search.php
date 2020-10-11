<?php
    if(!isset($_SESSION)){ 
        session_start(); 
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
    <link rel="stylesheet" href="../index.css">
    <script src="https://use.fontawesome.com/56316d49d4.js"></script>
    <title>iDiscuss-For Everyone!</title>
    <style>
    .search {
        min-height: 24rem;
    }
    </style>
</head>

<body>
    <?php
        include '_header.php'
    ?>


    <div class="container search">
        
        <?php
        include '_dbconnect.php';
        $whatwantedtosearch = $_POST['search'];
        echo '<h3>Search Results for <em>"'.$whatwantedtosearch.'"</em></h3>';
        $sql = "SELECT * FROM threads where MATCH (thread_name,ques_heading,ques_desc) against ('$whatwantedtosearch')";
        $result1 = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result1);
        if($num==0){
            
            echo'<div class="jumbotron">
            <h1 class="display-4">No Results Found!</h1>
            <p class="lead">Be the first to Ask...</p>
            
          </div>';
        }
        else{
            while($row = mysqli_fetch_assoc($result1)){
                $threadname = $row['thread_name'];
                $quesheading = $row['ques_heading'];
                $quesdescription = $row['ques_desc'];
                $username = $row['username'];
                $time = $row['Time'];
                $id = $row['thread_id'];
                echo'<div class="media my-3">
                    <img src="https://simg.nicepng.com/png/small/128-1280593_computer-user-icon-img-users.png" width="54px" class="mr-3" alt="abc">
                    <div class="media-body">
                        <h5 class="mt-0"><a href="/ForumWebsite/threadQues.php?id1='.$id.'&time='.$time.'">'.$quesheading.'</a></h5>
                        <p>'.$quesdescription.'</p>
                    </div>
                    </div>';
                
            }
        }

    ?>
    </div>


    <?php
        include '_footer.php'
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