<?php 
include('./connection.php');
try {
    if (isset($_GET["quizTitle"])&& isset($_GET["quizDescreption"])&& isset($_GET["quizQuestion"])) {
        $title = $_GET["quizTitle"];
        $descreption = $_GET["quizDescreption"];
        $question = $_GET["quizQuestion"];
    }
        $query = $connection->prepare("INSERT INTO `quizzes` (quizTitle, quizDescreption, quizQuestion) VALUES (:title, :descreption,:question)");
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':descreption', $descreption, PDO::PARAM_STR);
        $query->bindParam(':question', $question, PDO::PARAM_STR);
        $query->execute();



        echo json_encode([
            "message" => "the question created"]);

;
    
}
 catch (Throwable $e) {
    echo json_encode([
        "message" => "error",
    ]);
}