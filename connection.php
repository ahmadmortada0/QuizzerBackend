<php
    $domain ="mysql:host=localhost;dbname=quizzerdb"
    $username ="root"
    $password=""
    
    try {
        $connection =new PDO($domain,$username,$password);
    }
    catch{
        echo 'zzzzzzz'
    }