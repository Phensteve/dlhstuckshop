 <?php  //  $connect = mysqli_connect('sql312.infinityfree.com' , 'if0_34766496' , 'bNU15f4poXbLy2' , 'if0_34766496_dlhs_tuck');
    
        //  if (!$connect) {
            //  echo "Connection error: " . mysqli_connect_error();
        //  } 
        $connect = mysqli_connect('localhost','random_guy','1208','dlhs_tuck');

        if (!$connect) {
            echo "Connection error: " . mysqli_connect_error();
        }
?>

