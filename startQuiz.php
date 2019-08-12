<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname="quiz";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$now = time();
$timeSince = $now - $_SESSION['time_started'];
 
$remainingSeconds = ($_SESSION['countdown'] - $timeSince);

$_SESSION['countdown'] = $remainingSeconds;
 

if($remainingSeconds < 1){
   //Finished! Do something.
  header('Location: finishTest.php');
}

$id=$_SESSION['qno'];
$id=$id+1;
$_SESSION['qno']=$id;


if($id == $_SESSION['rows'] + 1)
{
	header('Location: finishTest.php');
}

$row=$_SESSION['que'][$id];


/*$query_run = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($query_run);*/



// Assign database response to variables
$question = $row['que'];
$a1 = $row['opt1'];
$a2 = $row['opt2'];
$a3 = $row['opt3'];
$a4 = $row['opt4'];
$correct = $row['ans'];
$_SESSION['correct_ans'] = $correct;

?>

  <!DOCTYPE html>
  <html>
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
  <style type="text/css">
    .card{
      margin: 0 auto;
      margin-top: 90px;
      border-radius: 25px;
    }
    .form
    {
      margin: auto;

    }
    .main{
        font-size: 20px;
    }
    .btn
    {
      padding-left: 50px;
      padding-top: 20px;
    }
    .opt{
      padding-top: 20px;
      padding-left: 50px;

    }
    .he{
      text-align: center;
      margin-top: 20px;
    }
    .in{
      margin-left: 40px;
      margin-top: 100px;
      padding-top: 30px;
      padding-right: 20px;
    }
  </style>  
  </head>
  <body>
    <div class="he">
       <h4>Your currect score is:<?php echo $_SESSION['correct'] ?></h4>
       <h5>Time remaining</h5>
       <b><p id="demo"></p></b>
     </div>

    <script type="text/javascript">
        var distance = <?php echo $remainingSeconds; ?>;
        setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();
          
        // Find the distance between now and the count down date
        
          
        // Time calculations for days, hours, minutes and seconds
        var minutes = Math.floor((distance / 60));

        var seconds = Math.floor(distance % 60);
          
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = minutes + "minutes" + seconds +"seconds";
        distance=distance - 1;
          
        // If the count down is over, write some text 
        if(distance<0)
        {
            document.getElementById("demo").innerHTML = "0 minutes" +"0 seconds";
        }
      }, 1000);
    </script>

   <div class="card bg-primary " style="width:60rem; height:30rem">
   <form method ="POST" action ="checkCorrect.php">

      <!-- <div class="form-check">
          <input class="form-check-input" type="hidden" name="response" id="exampleRadios" value="<?php echo $question;?>">
          <label class="form-check-label" for="exampleRadios"  style="margin-top: 50px; margin-left:20px"> <?=$question?></label><br><br>
      </div>
      <div style="margin-left: 30px">
      <div class="form-check">
          <input class="form-check-input" type="radio" name="response" id="exampleRadios1" value="<?=$a2?>">
          <label class="form-check-label" for="exampleRadios1"> <?=$a1?></label><br>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="response" id="exampleRadios2" value="<?php echo $a1?>">
          <label class="form-check-label" for="exampleRadios2"> <?=$a2?> </label>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="response" id="exampleRadios3" value="<?=$a3?>">
          <label class="form-check-label" for="exampleRadios3"> <?=$a3?> </label>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="response" id="exampleRadios4" value="<?=$a4?>">
          <label class="form-check-label" for="exampleRadios4"> <?=$a4?> </label><br><br>
      </div>
    </div>
      <div class="card-footer">
         <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 30px">Submit</button>
      </div> -->



      <form method ="POST" action ="checkCorrect.php">
        <div class="main">
          <div class="in">
            <input type="hidden" name="question_id" value="<?php echo $question;?>"><?=$question?><br>
          </div> 
          <div class="opt">
            <input type="radio" name="response" value="<?php echo $a1?>"><?=$a1?><br>

            <input type="radio" name="response" value="<?=$a2?>"><?=$a2?><br>

            <input type="radio" name="response" value="<?=$a3?>"><?=$a3?><br>

            <input type="radio" name="response" value="<?=$a4?>"><?=$a4?><br>
          </div> 
          <div class="btn">
            <input type = "submit" Name = "submit" Value = "Answer" style="color: green;">      
        </div>
      </form>
   </form>
   </div>
  </body>
  </html>




 

