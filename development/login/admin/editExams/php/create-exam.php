<?php

require_once('../../../../../include/config.php');

$connect = mysqli_connect("127.0.0.1:3306", "root", DB_PASS, "exams");
$exam = "CREATE TABLE " . $_POST['name'] . " ( question_id INT NOT NULL AUTO_INCREMENT, question VARCHAR(21844) NOT NULL, image VARCHAR(1000), answer VARCHAR(5) NOT NULL, PRIMARY KEY (question_id));";
$answers = "CREATE TABLE answers" . $_POST['name'] . " ( answer_id INT NOT NULL AUTO_INCREMENT, question_id INT NOT NULL, answer VARCHAR(21844) NOT NULL, PRIMARY KEY (answer_id), FOREIGN KEY (question_id) REFERENCES exam1 (question_id) ON DELETE CASCADE);
";
$ids = "CREATE TABLE ids" . $_POST['name'] . " (id INT NOT NULL AUTO_INCREMENT, study_id VARCHAR(100) NOT NULL, PRIMARY KEY (id))";
$result = mysqli_query($connect,$exam);
$result2 = mysqli_query($connect,$answers);
$result3 = mysqli_query($connect,$ids);
if($result and $result2){
  echo '{"result": true}';
}
else{
  echo '{"result": false}';
}

?>