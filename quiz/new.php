<?php
    session_start();
    if(time() > $_SESSION['expire']){
      header("Location: logout.php");
  }
    else{
    
    if(!isset($_SESSION['login_user'])){
      header("Location: login.php");
    }
    include 'connection.php';
    $email=$_SESSION['login_user'];
    $e="select * from avhan21 where email='$email';";
    $query = mysqli_query($conn,$e );
    $row = mysqli_fetch_array($query);
   
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>तूर्यनाद</title>
		<?php include "meta.php";?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/e0cbc93328.js" crossorigin="anonymous"></script>
	<style>
    .timer {
    position: relative;
    width: 100%;
    text-align: center;
    background: #333;
    z-index: 10;
    color: white;
}
.content {
    margin: 75px 0px;
}
.content ul {
    font-size: 19px;
    font-weight: 600;
}
.content ul li {
    margin: 10px 10px;
    font-size: 18px;
    font-weight: 600;
}
.content .form1 {
    margin: 44px 0px;
    text-align: center;
}
.content .form1 label {
    margin: 13px 0px;
    font-weight: 600;
    font-size: 18px;
}
.content .form1 label input {
    margin: 0px 7px;
}

.content .form1 button.btn.btn-default {
    text-align: center;
    display: block;
    margin: 34px 0px;
    color: white;
    background: #333;
    font-weight: 600;
    font-size: 17px;
    width: 100%;
}
@media (max-width: 991px) {
  .timer {
    position: fixed;
    top: 0;
    left: 0;
}
.content ul {
    padding: 0px 10px;
}
.content .form1 {
    margin: 22px 0px;
}
.content {
    margin: 100px 0px;
}
}
	</style>
</head>
<body>
  <div class="timer">
  <div class="container">
	<div class="row">
    <h2 id="countTime">10:20</h2>
    <h5>Do not refresh the page otherwise your data will be lost</h5>
  </div>
</div>
  </div>
<div class="content">
<div class="container">
	<div class="row">
    <div class="col-xs-12">
      <ul>
      निर्देश:
        <li>सभी प्रश्नों का उत्तर देना अनिवार्य है।</li>
        <li>समय सीमा: 30 मिनट</li>
        <li>सही उत्तर के लिए +4 एवं गलत उत्तर के लिए -1 अंक प्रदान किए जाएंगे।</li>
        <li>प्रश्नपत्र करते समय टैब नही बदलें, यदि आप टैब बदलते है तो आपका प्रश्नपत्र टैब बदलते ही जमा हो जायेगा।</li>
        Instructions:
        <li>All questions are compulsory.</li>
        <li>Max Time alloted: 30min</li>
        <li>For every correct answer +4 and for every wrong answer -1 marks will be provided.</li>
        <li>Do not change tab while doing question paper. Your question paper will be submitted as soon as the tab is changed.</li>
      </ul>
    </div>
	<form class="col-xs-12 form1" method="POST" action="paper-list.php">
        <label class="checkbox-inline">
        <input type="radio" name="ppr" id="inlineCheckbox1" value="sampadak" <?php if($row['sampadak']>1||$row['sampadak']<0) echo "disabled" ?>> संपादक/प्रबंधक
      </label>
      <label class="checkbox-inline">
        <input type="radio" name="ppr" id="inlineCheckbox2" value="abhikalpak"  <?php if($row['abhikalpak']>1||$row['abhikalpak']<0) echo "disabled" ?> > अभिकल्पक
      </label>
      <label class="checkbox-inline">
        <input type="radio" name="ppr" id="inlineCheckbox3" value="hinditar"  <?php if($row['hinditar']>1 ||$row['hinditar']<0) echo "disabled" ?> > हिंदीतर
      </label>
      <button type="submit" class="btn btn-default">Submit</button>
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
var countdown =  5* 60 * 1000;
var timerId = setInterval(function(){
  countdown -= 1000;
  var min = Math.floor(countdown / (60 * 1000));
  var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);
  if (countdown <= 0) {
    window.location.replace("logout.php");
  } else {
     $("#countTime").html(min + " : " + sec);
  }
}, 1000);
</script> 
        </body>
    </html>
<?php } ?>