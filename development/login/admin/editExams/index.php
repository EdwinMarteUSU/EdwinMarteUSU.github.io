<?php
include('../../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Exams</title>
  <!-- <meta name="viewport" content="width=device-width,initial-scale=1"> -->
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
    rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src='./js/main.js'></script>
  <script src="../../../../js/jquery.cookie.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="contentMiddle">
        <?php require_once('../header/header.php');?>
	</div>
  <div id="table">

  </div>
  <div id="exam" style="display:none;">
  </div>
  <div id="add" style="display:none;">
    <label for="name">Exam name:</label>
    <input type="text" id="name" name="name">
    <button class="btn btn-lg btn-success" onclick="createExam()">Create</button>
  </div>
  <div id="questions" style="display:none;">
    <div class="form-group">
      <label for="name">Question:</label>
      <input type="text" class="form-control"  id="question" placeholder="Enter the question">
    </div>
    <div class="form-group">
      <label for="name">Possible answer A:</label>
      <input type="text" class="form-control" placeholder="Answer A" id="A">
    </div>
    <div class="form-group">
      <label for="name">Possible answer B:</label>
      <input type="text" class="form-control" id="B" placeholder="Answer B">
    </div>
    <div class="form-group">
      <label for="name">Possible answer C:</label>
      <input type="text" class="form-control" id="C" placeholder="Answer C">
    </div>
    <div class="form-group">
      <label for="name">Possible answer D:</label>
      <input type="text" class="form-control" id="D" placeholder="Answer D">
    </div>
    <div class="form-group">
      <label for="name">Possible answer E:</label>
      <input type="text" class="form-control" id="E" placeholder="Answer E">
    </div>
    <div class="form-group">
      <label for="name">Correct answer:</label>
      <input type="text" class="form-control" maxlength="1"style="text-transform: uppercase" onkeydown="return limitInput(event);" id="correct" placeholder="Please enter the letter of the correct answer A-E">
    </div>
    <label for="image">Image:</label>
    <div class="custom-file">
      <input accept="image/*" type="file" class="custom-file-input" id="image">
      <label class="custom-file-label" for="image" id="label">Choose file</label>
    </div>
    <div style="display:flex; justify-content:space-between; padding:10px;">
      <button class="btn btn-secondary" onclick="backToExams()">Back to exams</button>
      <button class="btn btn-lg btn-success" onclick="newQuestion()">Add question</button>
    </div>
  </div>

</body>

</html>
