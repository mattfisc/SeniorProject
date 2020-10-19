<!--heading-->
<div class='header'>
        
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Book Swap</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <img src="../img/menu.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="../home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="../login_feature/login_form.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="../signup_feature/signup_form.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../about_feature/about.php">About</a></li>
                    </ul>
                    
                </div>
                <div>
                    <ul class=" navbar-nav ml-auto ">

                        
                        <?php
                            if(isset($_SESSION['idUsers'])){
                                echo "<li class='nav-item'>
                                        <a class='text-light pr-2' href='../member_feature/member.php'>
                                            <img src='../img/user.png' width='30' height='30' class='d-inline-block align-top'>".$_SESSION['userUid']."            
                                        </a>
                                    </li>
        
                                    <li class='nav-item'>
                                        <form action='includes/logout.inc.php' method='get'>
                                            <button class='bg-light text-dark rounded' name='logout-submit' type='submit'>Logout</button>
                                        </form>
                                    </li>
                                ";
                                
                            }
                            else{
                                echo "<li class='nav-item'>
                                        <img src='../img/user.png' width='30' height='30' class='d-inline-block align-top'>Guest
                                    </li>";
                            }
                            ?>
                            
                        
                    </ul>
                    
                </div>
            </div>
        </nav>

    </div>