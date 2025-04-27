<?php 
include('./connection.php');


try {

    if (isset($_POST["email"]) && isset($_POST["password"])&&isset($_POST["name"]) ) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name=$_POST["name"];

    }
        $query = $connection->prepare("SELECT * FROM `users` WHERE userEmail = :email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
            echo json_encode([
                "message" => "THE EMAIL ALEARDY EXCISTED"
            ]);
    } else {
                $query = $connection->prepare("INSERT INTO `users` (userName, userEmail, userPassword) VALUES (:name, :email,:password)");
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->execute();
                echo json_encode([
                    "message" => "THE EMAIL is registered"
                ]);
        }
}
    catch (Throwable $e) {
    echo json_encode([
        "message" => "error",
    ]);
}