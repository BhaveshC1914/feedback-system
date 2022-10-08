<html>
<body onload="send();">
<head>


</head>
<?php
if(isset($_POST['submit']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    switch($type)
    {
        case "0": // code for login into princpal
?>
<form action="principal_login.php" method="post" id="myform" >
    <input type="hidden" name="username" value="<?php echo $username; ?>">
    <input type="hidden" name="password" value="<?php echo $password; ?>">

 </form>





<?php






        break;


        case "1": // code for login into hod



            ?>
   <form action="hod_login.php" method="post" id="myform" >
    <input type="hidden" name="username" value="<?php echo $username; ?>">
    <input type="hidden" name="password" value="<?php echo $password; ?>">

 </form>



            <?php




        break;


        case "2": // code for login into student

            ?>

<form action="student_login.php" method="post" id="myform" >
    <input type="hidden" name="username" value="<?php echo $username; ?>">
    <input type="hidden" name="password" value="<?php echo $password; ?>">

 </form>


            <?php



        break;


    }







}else{

    header('Location: index.php');
}

?>


<script>


  function send()
  {
    document.getElementById("myform").submit();

  }



    </script>
</body>
</html>