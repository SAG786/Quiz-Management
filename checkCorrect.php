<?php

session_start();
// Check user answer
if (isset($_POST['submit'])) {  

    $selected_radio = $_POST['response'];
   // echo $selected_radio." ".$_SESSION['correct_ans'];
    if ($selected_radio == $_SESSION['correct_ans'])
    {
      $temp = $_SESSION['correct'];
      $temp = $temp + 1;
      $_SESSION['correct'] = $temp;
    }
    header('Location: startQuiz.php');
}
?>