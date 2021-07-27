<?php

    session_start();
    if(time() > $_SESSION['expire']){
        header("Location: logout.php");
    }
    else{

        include 'connection.php';
    $email= $_SESSION['login_user'];
    $post=$_POST['ppr'];
    $post1=$_POST['ppr'];
    
    $dd="select * from avhan21 where email='$email';";
    $qq = mysqli_query($conn,$dd );
    $rr = mysqli_fetch_array($qq);
    if($rr[$post]>1||$rr[$post]<0)
    {
         header("Location: logout.php");
    }
    else{
    $tt='time';
    $tt.=$post;
    if(($rr[$tt])==0)
    {
       $phpvar=time();
       $fff="UPDATE avhan21 SET $tt=$phpvar WHERE email='$email';";
       mysqli_query($conn,$fff);
    }
    else
    {
        $var=time()-$rr[$tt];
        $var=$var/60;
        if($post=='hinditar')
        $var=45-$var;
        else
        $var=30-$var;
        $st='start';
        $st.=$post;
        $ffff="UPDATE avhan21 SET $st=$var WHERE email='$email';";
        mysqli_query($conn,$ffff);
    }
    }
    
    
    $f="UPDATE avhan21 SET $post=1 WHERE email='$email';";

    mysqli_query($conn,$f);
    
    if($post=='sampadak'){ $ran=rand(1,2);
        $post.=$ran;
        $e="select * from $post;";
    }
    elseif($post=='abhikalpak'){ $ran=1;
        $post.=$ran;
        $e="select * from $post;";
    }else{ $ran=rand(1,2);
        $post.=$ran;
        $e="select * from $post;";
    }
    $query = mysqli_query($conn,$e );
    if(!$query)
        die("Null");
    ?>
    <html>
        <head>
            	<?php include "meta.php";?>
            <meta name="viewport" content="width=device-width, initial-scale=1">

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        </head>
        <style>
.timer {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    text-align: center;
    background: #333;
    z-index: 10;
    color: white;
}
.content {
    margin: 100px 0px;
}
.question {
    float: left;
    margin: 15px 5px;
}
.question .que {
    margin: 10px 0px;
    font-weight: 600;
    font-size: 15px;
}
.question label {
    margin: 5px 0px !important;
    font-size: 14px;
}
.question label input[type=radio] {
    margin-right: 3px;
}
.content .btn-default {
    background: #333;
    color: white;
    margin: 10px 0px;
}
        </style>
        <body onload="setTimeout('document.b1.submit();', 1795000);" oncopy="return false" oncut="return false" onpaste="return false">
        <div class="timer">
        <div class="container-fluid">
            <div class="row">
                <h1 id="countTime">10:20</h1>
                <h5>Do not refresh the page otherwise your data will be lost</h5>
            </div>
        </div>
        </div>
         <div class="content">
 <div class="container">
    <div class="row">
    <form name="b1" id="submit-form" method="POST" class="col-xs-12" action="result.php" >
        <input type="hidden" name="post1" value="<?php echo $post1 ?>">
    <input type="hidden" name="post" value="<?php echo $post ?>">
    <?php
    while($row = mysqli_fetch_assoc($query)) {
    ?> <div class="question col-xs-12">
        <div class="col-xs-12 que">प्र.<?php echo $row['id'] ?>&nbsp;&nbsp;<?php echo $row['que'] ?></div>
            <?php  if($row['img']!=""){ ?>
            <div class="col-xs-12 imgs"><img class="img-responsive" src="question/<?php  echo $post1."_".$ran."_".$row['id'].".jpg" ?>"></div>
            <?php } ?>
            <input type="hidden" name="que<?php echo $row['id'] ?>" value="0" />
            <label class="checkbox-inline col-xs-6">
        <input type="radio" name="que<?php echo $row['id'] ?>" id="<?php echo $post1.$row['id'].$row['opt1']; ?>" value="1" > <?php echo $row['opt1'] ?>
      </label>
      <label class="checkbox-inline col-xs-6">
        <input type="radio" name="que<?php echo $row['id'] ?>" id="<?php echo $post1.$row['id'].$row['opt2']; ?>" value="2"   > <?php echo $row['opt2'] ?>
      </label>
      <label class="checkbox-inline col-xs-6">
        <input type="radio" name="que<?php echo $row['id'] ?>" id="<?php echo $post1.$row['id'].$row['opt3']; ?>" value="3"   > <?php echo $row['opt3'] ?>
      </label>
      <label class="checkbox-inline col-xs-6">
        <input type="radio" name="que<?php echo $row['id'] ?>" id="<?php echo $post1.$row['id'].$row['opt4']; ?>" value="4" ><?php echo $row['opt4'] ?>
      </label>
    </div>
        
    <?php } ?>
    <button type="submit" class="btn btn-default col-xs-12" >Submit</button>
    </form>
    </div>
    </div>
        </div>


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
    $('input[type=radio]').click(function(){
    if (this.previous) {
        this.checked = false;
    }
    this.previous = this.checked;
    });
    </script>
    <script>
function form_submit() {
  var f = document.getElementById('submit-form');
     f.submit();
             
  } </script> 
  <script>
  <?php
    $ww="select * from avhan21 where email='$email';";
    $xx = mysqli_query($conn,$ww );
    $vv = mysqli_fetch_array($xx);
    $zz='start';
    $postt=$_POST['ppr'];
    $zz.=$postt;
    $ti=$vv[$zz];  ?>
var countdown =  <?php echo $ti ?>* 60 * 1000;
var timerId = setInterval(function(){
  countdown -= 1000;
  var min = Math.floor(countdown / (60 * 1000));
  var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);
  if (countdown <= 0) {
    var f = document.getElementById('submit-form');
     f.submit();
     clearInterval(timerId);
  } else {
     $("#countTime").html(min + " : " + sec);
  }
}, 1000);
</script> 
        </body>
    </html>
    
<?php } ?>