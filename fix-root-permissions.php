<?php
$host = 'mysql-68305d35.railway.internal';
$password = 'oTRpSwMtEuexbxlGHUdJeVvNCXRuoKuQ';

try {
    $pdo = new PDO("mysql:host=$host;", 'root', $password);
    
    // Otorgar permisos completos a root
    $pdo->exec("GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '$password'");
    $pdo->exec("GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY '$password'");
    $pdo->exec("FLUSH PRIVILEGES");
    
    echo "✅ Root permissions fixed!<br>";
    echo "Now try accessing WordPress again.";
    
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
