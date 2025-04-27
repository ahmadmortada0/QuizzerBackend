<?php  
include('./connection.php');
try {
    if (isset($_GET["quizID"])&&isset($_GET["quizTitle"])&&isset($_GET["quizDescreption"])&&isset($_GET["quizQuestion"]))
    {
        $id=$_GET["quizID"];
        $title = $_GET["quizTitle"];
        $descreption = $_GET["quizDescreption"];
        $question = $_GET["quizQuestion"];
    }
        $query = $connection->prepare("SELECT * FROM `quizzes` where quizID=:id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
       
        $query->execute();
        $quiz=$query->fetch(PDO::FETCH_ASSOC);
        if($quiz)
        {
            $query = $connection->prepare("UPDATE `quizzes` SET `quizTitle` = :quizTitle, `quizDescreption` = :quizDescreption, `quizQuestion` = :quizQuestion WHERE `quizzes`.`quizID` = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':quizTitle', $title, PDO::PARAM_STR);
            $query->bindParam(':quizDescreption', $descreption, PDO::PARAM_STR);
            $query->bindParam(':quizQuestion', $question, PDO::PARAM_STR);
            
            $query->execute();
        
            


            echo json_encode([
                "message" => "The quiz was updated successfully!",
                "quiz" => [
                    "id" => $id,
                    "title" => $title,
                    "descreption" => $descreption,
                    "question" => $question
                ]
            ]);
        }
        else{
            
        echo json_encode([
            "message" => "NO QUESTION FOUND"]);
        }
    
}
 catch (Throwable $e) {
    echo json_encode([
        "message" => "error",
        "error" => $e->getMessage()
    ]);
}