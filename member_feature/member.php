<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Textbook Swap</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">

  <script src="../message_feature/message.js"></script>
  <script src="../message_feature/conversation.js"></script>
  <script src="requestAd.js"></script>
  <script src="../booklist/book.js"></script>

</head>


<body id="mainbody" >
  <div class='page p-3'>

    <!--HEADER AND NAV BAR-->
    <?php
        require "../includes/header.php";
    ?>

   
    <!--FORM-->
    <div class="content m-auto">

      <div class="row">

        <!-- COL ONE -->
        <div class="pl-5 col-xs-12 col-sm-12 col-md-4 col-xl-4">

          <!-- DISPLAY ERRORS -->
          <div>
            <?php
              if(isset($_GET['success'])){
                if($_GET['success'] == "login")
                  echo "<p class='alert alert-success'>Successful Login!!</p>";
                else if($_GET['success'] == "sent")
                  echo "<p class='alert alert-success'>Message sent Successfully!!</p>";
                else if($_GET['success'] == "bookadded")
                  echo "<p class='alert alert-success'>Book Added!!</p>";
                else if($_GET['success'] == "bookdeleted")
                  echo "<p class='alert alert-success'>Book Deleted</p>";
                else if($_GET['success'] == "conversationdeleted")
                  echo "<p class='alert alert-success'>Conversation Deleted</p>";
              }
              else if(isset($_GET['error'])){
                if($_GET['error'] == "err")
                  echo "<p class='alert alert-danger'>Error!!</p>";
                else if($_GET['error'] == "conversationnotdeleted")
                  echo "<p class='alert alert-danger'>Error!!</p>";
                
              }
            ?>
          </div>
          

          <div class="pb-3" id="yourbooks">
            <h2 class=" font-weight-bold text-light m-auto " style="text-shadow: 2px 2px black">Your Book Ads</h2>
            <button type="submit" onclick="requestYourAds();" >Your Ads</button>
            <button><a href="../booklist/form_add_book.php">Add Book</a></button>
          </div>

          <div class="pb-3" id="message">
            <h2 class=" font-weight-bold text-light m-auto" style="text-shadow: 2px 2px black">Conversation List</h2>
              <button type="submit" onclick="displayConversations();" >Conversations</button>
              <p id="conversationList"></p>
          </div>

          <div class="pb-3" id="edit">
            <h2 class=" font-weight-bold text-light m-auto " style="text-shadow: 2px 2px black">Edit Profile</h2>
            <button type="submit" onclick="deleteAccount();" >Delete Account</button>
          </div>
        </div>

        <!-- COL TWO -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-xl-8">

          
          <!-- DISPLAY -->
          <h1 id='title' class="text-center font-weight-bold text-light m-auto" style="text-shadow: 2px 2px black"></h1>

          <table id="myTable" class="table table-bordered table-striped bg-light"></table>
      
          <div id="output"></div>
        
        </div>     
        
      </div>
      
      
    </div><!--END OF CONTENT-->
      

    <!--FOOTER-->
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