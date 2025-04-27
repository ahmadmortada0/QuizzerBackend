<?php 
include('./connection.php');


try {

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }

        $query = $connection->prepare("SELECT * FROM `questions` WHERE quizID = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $quiz = $query->fetch(PDO::FETCH_ASSOC);
    if ($quiz) {
        echo json_encode($quiz);
    } else {
        echo json_encode([
            "message" => "No quiz found "
        ]);
    }
}
catch (Throwable $e) {
    echo json_encode([
        "message" => "error"
    ]);
}