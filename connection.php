<?php
try{
    $domain = 'mysql:host=localhost:3307;dbname=quizzerdb';
    $username ='root';
    $password='';
    
    $connection =new PDO($domain,$username,$password);
}
catch(\throwable $e){
    echo $e;
}
    
