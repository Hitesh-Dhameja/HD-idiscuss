<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://use.fontawesome.com/56316d49d4.js"></script>
    <title>iDiscuss-For Everyone!</title>

</head>

<body>
    <?php
        include 'partials/_header.php'
    ?>

    <?php 
        if(isset($_GET['alert'])){
            
            echo'<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    Invalid Credentials . Please LogIn again to explore the forum.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
        else{
            if(isset($_GET['emailerror'])){
                echo'<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    Email Id already registered . Please LogIn again to explore the forum.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            else{
                if(isset($_GET['passerror'])){
                    echo'<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        Password and Confirm Password Must be equal.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
                else{
                    if(isset($_GET['success'])){
                        echo'<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        Successfully Registered . Please Login to explore the forum.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                    }
                }
            }
        }
        
        
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.freeimages.com/images/premium/previews/3778/37784730-code-zero-one-in-cyberspace.jpg"
                    class="d-block w-100" alt="..." style="width:350px;height:450px;">
            </div>
            <div class="carousel-item">
                <img src="https://images.alphacoders.com/665/thumb-1920-665091.jpg" class="d-block w-100" alt="..."
                    style="width:350px;height:450px;">
            </div>
            <div class="carousel-item">
                <img src="data:image/png;base64,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"
                    class="d-block w-100" alt="..." style="width:350px;height:450px;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




    <div class="container my-2 d-flex justify-content-center">
        <h4>Browse Categories:</h4>
    </div>

    <div class="container my-2">
        <div class="row">
            <?php
            include 'partials/_dbconnect.php';
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $cat = $row['category_name'];
                $desc = $row['category_description'];
                $id = $row['category_id'];
                echo'<div class="card my-2 mx-4" style="width: 20rem;">
                        <img src="https://source.unsplash.com/500x400/?coding,'.$cat.'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$cat.'</h5>
                            <p class="card-text">'.substr($desc,0,110).'...'.'</p>
                            <a href="thread.php/?id='.$id.'" class="btn btn-primary">View</a>
                        </div>
                    </div>';
                    }
        ?>
        </div>
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