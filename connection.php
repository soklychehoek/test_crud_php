<?php
$pdo =new PDO('mysql:host=localhost;port=3306;dbname=test','lyche','12345678');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>