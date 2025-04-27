<?php 
include('./connection.php');


try {


        $query = $connection->prepare("SELECT * FROM `quizzes` ");
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
        "message" => "error",
    ]);
}