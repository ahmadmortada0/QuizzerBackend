<?php  
include('./connection.php');
try {
    if (isset($_GET["id"])&&isset($_GET["title"])&&isset($_GET["quizID"])&&isset($_GET["correct"]));
    {
        $id=$_GET["id"];
        $title = $_GET["title"];
        $quizID = $_GET["quizID"];
        $correct = $_GET["correct"];
    }

        $query = $connection->prepare("SELECT * FROM `questions` where quesionID=:id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
       
        $query->execute();
        $question=$query->fetch(PDO::FETCH_ASSOC);
        if($question)
        {
            $query = $connection->prepare("UPDATE `questions` SET `questionTitle` = :title, `quizID` = :quizID , `questionCorrect` =:correct WHERE `questions`.`quesionID` = :id");
        
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':title', $title, PDO::PARAM_STR);
            $query->bindParam(':quizID', $quizID, PDO::PARAM_STR);
            $query->bindParam(':correct', $correct, PDO::PARAM_STR);
            
            $query->execute();
        
            


            echo json_encode([
                "message" => "The question was updated successfully!",
                "quiz" => [
                    "id" => $id,
                    "title" => $title,
                    "quizID" => $quizID,
                    "correct" => $correct
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