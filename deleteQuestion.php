<?php 
include('./connection.php');
try {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
        $query = $connection->prepare("SELECT * FROM `questions` where quesionID=:id ");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();


        $quiz = $query->fetch(PDO::FETCH_ASSOC);
    if($quiz){
        $query = $connection->prepare(" DELETE  FROM `questions` where quesionID=:id ");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        
        echo json_encode([
            "message" => "the question deleted"]);

    }else{

        echo json_encode([
                    "message" => "error"
        ]); }
} catch (Throwable $e) {
    echo json_encode([
        "message" => "error",
    ]);
}