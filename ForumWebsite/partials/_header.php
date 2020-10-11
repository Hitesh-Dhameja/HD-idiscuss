<?php
if(!isset($_SESSION)){ 
    session_start(); 
}
?>
<?php
    echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/ForumWebsite">
                <img src="https://image.shutterstock.com/image-vector/lets-discuss-speech-bubbles-lettering-260nw-1436436527.jpg"
                    width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy">
                    <span class="align-middle">iDiscuss</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/ForumWebsite">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        include '_dbconnect.php';
                        $sql = "SELECT * FROM `categories`";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $cat = $row['category_name'];
                            $id = $row['category_id'];
                            echo'<a class="dropdown-item" href="/ForumWebsite/thread.php/?id='.$id.'">'.$cat.'</a>';
                        }
                        echo'</div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                </ul>
                  
                <form class="form-inline my-2 my-lg-0" method="POST" action="/ForumWebsite/partials/_search.php">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>

                </form>';

            $check = isset($_SESSION["loggedin"]);
            if(!$check){
                echo'
                    <button type="button" class="btn btn-outline-success my-2 mx-3 my-sm-0" data-toggle="modal"
                        data-target="#exampleModal">
                        Login
                    </button>
        
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Login to iDiscuss Forum</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/ForumWebsite/partials/_handlelogin.php">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address:</label>
                                            <input type="email" name="email" class="form-control ml-1" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                            <small id="emailHelp" class="form-text text-muted">We'.'ll never share your email with
                                                anyone else.</small>
                                        </div>
                                        <div class="form-group my-1">
                                            <label for="exampleInputPassword1">Password:</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1">
                                        </div>
                                        <button type="submit" class="btn btn-success my-1">Submit</button>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
        
        
                    <button type="button" class="btn btn-outline-danger my-2 mx-1 my-sm-0" data-toggle="modal"
                        data-target="#signupModal">
                        SignUp
                    </button>
        
                    <!-- Modal -->
                    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="signupModalLabel">SignUp to iDiscuss Forum</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/ForumWebsite/partials/_handlesignup.php">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username:</label>
                                            <input type="text" name="username" class="form-control ml-1" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address:</label>
                                            <input type="email" name="email" class="form-control ml-1" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                            <small id="emailHelp" class="form-text text-muted">We'.'ll never share your email with
                                                anyone else.</small>
                                        </div>
                                        <div class="form-group my-1">
                                            <label for="exampleInputPassword1">Password:</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="form-group my-1">
                                            <label for="exampleInputPassword1">Confirm Password:</label>
                                            <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <button type="submit" class="btn btn-success my-1">Submit</button>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>';
                
            }
            else{
                echo'<div class="dropdown ml-2">
                        <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            '. $_SESSION['username'] .'</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="partials/_logout.php">Logout</a>
                        </div>
                    </div>';
     
                }
            




echo'</div>
</nav>';
?>