<?php 
include('./connection.php');

header('Content-Type: application/json');

try {

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];


        $query = $connection->prepare("SELECT * FROM `users` WHERE userEmail = :email AND userPassword = :password");

        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);


        $query->execute();


        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode([
                "message" => "WELCOME"
            ]);
        } else {
            echo json_encode([
                "message" => "Not found"
            ]);
        }
    } else {
        echo json_encode([
            "message" => "Missing email or password"
        ]);
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        "message" => "error",
    ]);
}
// }
// catch (\Throwable $e) {
//  echo json_encode(["
//      message "=>"not found "
//      ]);
// }

//  $result=[];
//  while ($user=$query->fetch(PDO::FETCH_ASSOC)){
//  array_push(result,$user);
//  $result[]=$user;
//  }
// echo json_encode($result);