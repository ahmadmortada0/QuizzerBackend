<?php 
include('./connection.php');
try {
    if (isset($_GET["questionTitle"])&& isset($_GET["quizID"])&& isset($_GET["correct"])) {
        $title = $_GET["questionTitle"];
        $quizID = $_GET["quizID"];
        $correct= $_GET["correct"];
    }
        $query = $connection->prepare("INSERT INTO `questions` (questionTitle,quizID, questioncorrect) VALUES (:title ,:quizID,:correct)");
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':quizID', $quizID, PDO::PARAM_INT);
        $query->bindParam(':correct', $correct, PDO::PARAM_INT);
        $query->execute();
        echo json_encode([
       "message" => "the question created"]);
    
}
 catch (Throwable $e) {
    echo json_encode([
        "message" => "error",
    ]);
}