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
    $email= $_SESSION['login_user'];
    $obj=$_POST;
    $post=$_POST['post'];
    $post1=$_POST['post1'];

    $e="select ans from $post;";
    $query = mysqli_query($conn,$e);
    $i=0;
    while($row = mysqli_fetch_assoc($query)) {
     $arr[$i++][0]=$row['ans'];
    }
    array_shift($obj);
    array_shift($obj);
    $i=0;
    foreach ($obj as $key => $value) {
        $arr[$i++][1]=$value;
    }
    
    $sum=0; $correct=0;$wrong=0;$noans=0;
    while($i--){
        if($arr[$i][1]==0)
        {
            $noans++;
            continue;
        }
        elseif($arr[$i][0]==$arr[$i][1])
        {
            $correct++;
            $sum=$sum+4;
        }
        else {
            $wrong++;
            $sum--;
        }
    }
  
    if(function_exists('date_default_timezone_set')) {
        date_default_timezone_set("Asia/Kolkata");
    }
    $date = date('Y-m-d H:i:s');
    if($post1==0 || $post1==1)
    $f="UPDATE `avhan21` SET $post1=$sum ,`timeofsubmit`='$date' WHERE email='$email';";
    if(!mysqli_query($conn,$f)){
        echo "Error description this point: " .mysqli_error($conn);
    }
unset($_SESSION['login_user']);
?>
<html>
        <head>
           	<?php include "meta.php";?>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        </head>
        <style>
            .score {
    text-align: center;
    font-size: 16px;
    background: wheat;
}
.task2 {
    padding: 15px;
    font-size: 17px;
    margin-bottom: 50px;
    font-weight: 600;
}
.task2 h3 {
    font-size: 25px;
    text-align: center;
    margin: 20px 0px;
}
.task2 ul {
    padding-left: 22px;
}
.task2 a.btn.btn-primary i.fa.fa-download {
    margin-right: 10px;
}
.download {
    margin: 15px 0px;
    margin-bottom: 40px;
    text-align: center;
}
             </style>
        <body>
     <!--   <div class="score">
        <div class="container">
            <div class="row">
                <h3>Score Card</h3>
                 <p class="text-info">Download Pdf of your task you will be logged out in 60 sec</p>
                <p class="text-info">Time Of Submission : &nbsp;&nbsp;<?php echo $date ?></p>
            <p class="text-info">Total Score : &nbsp;&nbsp;<?php echo $sum ?></p>
            <p class="text-info">Correct Ans :&nbsp;&nbsp;<?php echo $correct ?></p>
            <p class="text-info">Wrong Ans :&nbsp;&nbsp;<?php echo $wrong ?></p>
            <p class="text-info">Not Attempted :&nbsp;&nbsp;<?php echo $noans ?></p>
            </div>
        </div>
        </div>   -->
        <div class="task2">
        <div class="container">
            <div class="row">
                            <?php if($post1!='hinditar'){ ?>     <h3 class="col-xs-12">अनुभाग- (2) व्यक्तिपरक अनुभाग</h3><?php } ?>

                <?php if($post=='abhikalpak1'){ ?> 
            <div class="col-xs-12" >
            <p>निम्नलिखित कार्यों को आप सॉफ्टवेयर या हस्तनिर्मित माध्यमों से प्रस्तुत कर सकते हैं। समय सीमा : 48 घंटे
अपनी प्रस्तुति को .jpeg  फॉर्मेट में tooryanaad.aahvan20@gmail.com पर अपने नाम, आह्वान आई डी, और ब्रांच के साथ भेजें। 48 घंटे के पश्चात आने वाली प्रस्तुतियों को अमान्य माना जाएगा।</p>
<ul>
    <li>टास्क 1= राजभाषा कार्यान्वयन समिति के लिए एक लोगो डिजाइन करें और उसे बनाने के उद्देश्य को समझाए। </li>
    <li>टास्क 2= 'समूह नृत्य' तूर्यनाद की एक नृत्य प्रतियोगिता है, जिसमें भारतवर्ष के विभिन्न नृत्य शैलियों को सामूहिक रूप से प्रस्तुत किया जाता है। समूह नृत्य का एक पोस्टर डिजाइन करें।</li>
</ul>



<p>Submit the following questions using a software or in handwritten mode. Time limit: 48 Hours
Send your presentation in .jpeg format to tooryanaad.aahvan20@gmail.com with your name, Aahvan ID and Branch. Files send after 48 hours will not be considered.</p>
<ul>
    <li>Task1 = Design a logo for Rajbhasha Karyanvayan Samiti and describe your objective behind it.</li>
    <li>Task 2= 'Samuh Nritya’ is a Dance Competition of Tooryanaad where the participants would have to perform traditional dances of India. Design a logo for ‘Samuh Nritya'.</li>
</ul>

</div>
<div class="col-xs-12 download"><a href="pdf/<?php echo $post.".pdf" ?>" class="btn btn-primary" download=""> <i class="fa fa-download" aria-hidden="true"></i>Download Pdf</a> </div>

<?php } ?>
<?php if($post=='abhikalpak2'){ ?> 
            <div class="col-xs-12" >
            <p>निम्नलिखित कार्यों को आप सॉफ्टवेयर या हस्तनिर्मित माध्यमों से प्रस्तुत कर सकते हैं। समय सीमा : 48 घंटे
अपनी प्रस्तुति को .jpeg  फॉर्मेट में tooryanaad.aahvan20@gmail.com पर अपने नाम, आह्वान आई डी, और ब्रांच के साथ भेजें। 48 घंटे के पश्चात आने वाली प्रस्तुतियों को अमान्य माना जाएगा।</p>
<ul>
    <li>टास्क 1= राजभाषा कार्यान्वयन समिति के लिए एक लोगो डिजाइन करें और उसे बनाने के उद्देश्य को समझाए। </li>
    <li>टास्क 2= 'चक्रव्यूह' तूर्यनाद की एक रोचक प्रतियोगिता है, जिसमें भाग लेने वालों को पहेलियाँ सुलझा कर लक्ष्य तक पंहुचना होता है। यह एक प्रकार का treasure hunt होता है। चक्रव्यूह का एक पोस्टर डिजाइन करें।</li>
</ul>


<p>Submit the following questions using a software or in handwritten mode. Time limit: 48 Hours
Send your presentation in .jpeg format to tooryanaad.aahvan20@gmail.com with your name, Aahvan ID and Branch. Files send after 48 hours will not be considered.</p>
<ul>
    <li>Task1 = Design a logo for Rajbhasha Karyanvayan Samiti and describe your objective behind it.</li>
    <li>Task 2= 'Chakravyuh’ is an adventurous Competition of Tooryanaad where the participants would have to solve riddles to achieve your goal. This event is sort of Treasure Hunt. Design a logo for ‘Chakravyuh'.</li>
</ul>

</div>
<div class="col-xs-12 download"><a href="pdf/<?php echo $post.".pdf" ?>" class="btn btn-primary" download=""> <i class="fa fa-download" aria-hidden="true"></i>Download Pdf</a> </div>
<?php } ?>
<?php if($post=='sampadak1'){ ?> 
            <div class="col-xs-12" >
             <ul> निर्देश-
                <li>इस खंड में दो प्रश्न हैं।</li>
                <li>प्रत्येक प्रश्न के 20 अंक हैं। </li>
                <li>रचनात्मकता, वर्तनी एवं भाषाशैली के आधार पर अंक प्रदान किए जाएंगे।</li>
                <li>शब्द सीमा - 250 शब्द</li>
                <li>उत्तरपुस्तिका के लिए स्वयं यथा उपलब्ध सफेद पृष्ठों का उपयोग करें।</li>
                <li>अपनी उत्तरपुस्तिका के सभी पृष्ठों का छायाचित्र लेकर पीडीएफ फाइल के रूप में ईमेल- tooryanaad.aahvan20@gmail.com पर भेजें।</li>
                <li>उत्तरपुस्तिका पर अपना आह्वान पंजीयन क्रमांक एवं संपर्क सूत्र अवश्य लिखें।</li>
                <li>उत्तरपुस्तिका की पीडीएफ़ अनुभाग-(1) के संकलन समय के पश्चात 1 घंटे की समय सीमा में भेजें। </li>
            </ul> 

<p>प्रश्न-1. वर्तमान परिस्थितियों के परिप्रेक्ष्य में जहाँ कोरोना वायरस से पूरा देश जूझ रहा है और वहीं दूसरी तरफ इस महामारी से संबन्धित झूठी अफवाहें भी चरम पर हैं, इससे निपटने के लिए आप समाज को कैसे जागरूक करेंगे?</p>
<p>प्रश्न- 2. वर्तमान परिदृश्य में हिन्दी मूल रूप में अन्य भाषाओं के शब्दों के प्रयोग से हो रहे आघात को दर्शाता हुआ एक लेख लिखें।</p>
</div>
<div class="col-xs-12 download"><a href="pdf/<?php echo $post.".pdf" ?>" class="btn btn-primary" download=""> <i class="fa fa-download" aria-hidden="true"></i>Download Pdf</a> </div>

<?php } ?>
<?php if($post=='sampadak2'){ ?> 
            <div class="col-xs-12" >
            <ul> निर्देश-
                <li>इस खंड में दो प्रश्न हैं।</li>
                <li>प्रत्येक प्रश्न के 20 अंक हैं। </li>
                <li>रचनात्मकता, वर्तनी एवं भाषाशैली के आधार पर अंक प्रदान किए जाएंगे।</li>
                <li>शब्द सीमा - 250 शब्द</li>
                <li>उत्तरपुस्तिका के लिए स्वयं यथा उपलब्ध सफेद पृष्ठों का उपयोग करें।</li>
                <li>अपनी उत्तरपुस्तिका के सभी पृष्ठों का छायाचित्र लेकर पीडीएफ फाइल के रूप में ईमेल- tooryanaad.aahvan20@gmail.com पर भेजें।</li>
                <li>उत्तरपुस्तिका पर अपना आह्वान पंजीयन क्रमांक एवं संपर्क सूत्र अवश्य लिखें।</li>
                <li>उत्तरपुस्तिका की पीडीएफ़ अनुभाग-(1) के संकलन समय के पश्चात 1 घंटे की समय सीमा में भेजें। </li>
            </ul> 

            <p>प्रश्न-1. तूर्यनाद के किसी कार्यक्रम हेतु आपको अपने महाविद्यालय के निदेशक की आज्ञा लेनी है, परन्तु आपको आज्ञा नही मिल रही लेकिन समिति के लिए कार्यक्रम करना अत्यन्त आवश्यक है। ऐसी स्थिति में आप क्या करेंगे?</p>
            <p>प्रश्न- 2. 'पाश्चात्य संस्कृति का भारत की गौरवशाली संस्कृति पर प्रभाव' विषय पर दोनों संस्कृतियों के मेल से भारतीय अखण्डता को हुए नुकसान को दर्शाता हुआ लेख लिखें।</p>
            </div> 
     <div class="col-xs-12 download"><a href="pdf/<?php echo $post.".pdf" ?>" class="btn btn-primary" download=""> <i class="fa fa-download" aria-hidden="true"></i>Download Pdf</a> </div>

            <?php } ?>

            <?php if($post=='sampadak3'){ ?>
            <div class="col-xs-12" sampadak3>
            <ul> निर्देश-
                <li>इस खंड में दो प्रश्न हैं।</li>
                <li>प्रत्येक प्रश्न के 20 अंक हैं। </li>
                <li>रचनात्मकता, वर्तनी एवं भाषाशैली के आधार पर अंक प्रदान किए जाएंगे।</li>
                <li>शब्द सीमा - 250 शब्द</li>
                <li>उत्तरपुस्तिका के लिए स्वयं यथा उपलब्ध सफेद पृष्ठों का उपयोग करें।</li>
                <li>अपनी उत्तरपुस्तिका के सभी पृष्ठों का छायाचित्र लेकर पीडीएफ फाइल के रूप में ईमेल- tooryanaad.aahvan20@gmail.com पर भेजें।</li>
                <li>उत्तरपुस्तिका पर अपना आह्वान पंजीयन क्रमांक एवं संपर्क सूत्र अवश्य लिखें।</li>
                <li>उत्तरपुस्तिका की पीडीएफ़ अनुभाग-(1) के संकलन समय के पश्चात 1 घंटे की समय सीमा में भेजें। </li>
            </ul> 

            <p>प्रश्न-1. आप किसी प्रातियोगिता का समन्वयन कर रहे हैं और कार्यक्रम शुरू होने का निर्धारित समय निकट आ चुका है परन्तु सभी प्रतिभागी समय पर उपस्थित नही हैं। उस परिस्थिति में आप क्या करेंगे जब एक तरफ आपको मुख्य अतिथि के अमूल्य समय के साथ-साथ पूरे तूर्यनाद कार्यक्रम की समयबाध्यता पर भी ध्यान देना है, वहीं दूसरी तरफ आपके प्रतिभागी नही हैं?</p>
            <p>प्रश्न- 2. 'हिन्द राष्ट्र की एकता हिन्दी से' विषय पर लेख लिखें?</p>
</div>
<div class="col-xs-12 download"><a href="pdf/<?php echo $post.".pdf" ?>" class="btn btn-primary" download=""> <i class="fa fa-download" aria-hidden="true"></i>Download Pdf</a> </div>

 <?php } ?>
            </div>
        </div>
        </div>
        <br>
        <h1 style="color: red; text-align: center;">सबमिट करने के लिए धन्यवाद। आपकी प्रतिक्रिया दर्ज कर ली गई है|</h1>
        <p style="text-align:center;"><a href="logout.php" style="border: 2px solid black; text-align: center;"><h1>बंद करे</h1></a></p>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
  <!--   <script>
var countdown =  1* 60 * 1000;
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
</script>   --> </body>
    </html>

<?php
// header( "refresh:60;url=logout.php" );
} ?>