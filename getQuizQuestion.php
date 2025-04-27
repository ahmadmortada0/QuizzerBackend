<?php 
include('./connection.php');


try {

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }

        $query = $connection->prepare("SELECT * FROM `questions` WHERE quizID = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result=[];
        while ($quiz=$query->fetch(PDO::FETCH_ASSOC)){
       //  array_push(result,$quiz);
        $result[]=$quiz;
        }
       echo json_encode($result);
}
catch (Throwable $e) {
    echo json_encode([
        "message" => "error"
    ]);
}