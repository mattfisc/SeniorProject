<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
   
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body id="mainbody">
    
    <div class="content">
        <!-- HEADER -->
        <?php
                require "../includes/header.php";
            ?>

        <!-- CONTENT -->
        <div class="content col-xs-12 col-sm-12 col-md-8 col-xl-8 m-auto">
                <!--MESSAGE RETURNED-->
                <div class="row p-1 m-auto" >
                    <?php
                        if(isset($_GET['success'])){
                            if($_GET['success'] == "boodadded"){
                                echo "<p class='success'>Book Added! Please add a picture!</p>";
                            }
                        }
                        else if(isset($_GET['error'])){
                            if($_GET['error'] == "tableinsert"){
                                echo "<p class='error'>Insert not successful!</p>";
                            }
                            if($_GET['error'] == "size"){
                                echo "<p class='error'>Error file was too big</p>";
                            }
                            if($_GET['error'] == "uploading"){
                                echo "<p class='error'>Error uploading file</p>";
                            }
                            if($_GET['error'] == "wrongtype"){
                                echo "<p class='error'>Error wrong file type</p>";
                            }
                        }
                    ?>
                </div>

                <!--FORM-->
                <div class="row m-auto " >
                    <div class=" m-auto" >
                        <h2 class='text-center font-weight-bold text-light m-auto p-3' style='text-shadow: 2px 2px black'>Upload Photos</h2>
                        <form action='includes/upload_photo.php' method='post' enctype='multipart/form-data'>
                            <input  id='file' name='file' type='file'>
                            <br>
                            <button class='bg-dark text-light' name='submit' type='submit'>Upload</button>
                            <button class='bg-dark text-light' name='' type=''><a href="form_book_description.php">Skip</a></button>
                        </form>
    
                    </div>
                </div>
                
            </div> <!--END OF CONTENT-->
        <!-- FOOTER -->
        <?php
            require "../includes/footer.php";
        ?>

    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

</body>
</html>