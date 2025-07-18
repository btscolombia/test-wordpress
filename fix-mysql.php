<?php
// Script para arreglar permisos MySQL
$host = 'mysql-68305d35.railway.internal';
$root_password = 'oTRpSwMtEuexbxlGHUdJeVvNCXRuoKuQ';

try {
    // Conectar como root
    $pdo = new PDO("mysql:host=$host;", 'root', $root_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to MySQL as root<br>";
    
    // Crear usuario WordPress
    $pdo->exec("CREATE USER IF NOT EXISTS 'wordpress'@'%' IDENTIFIED BY 'wp_secure_123'");
    $pdo->exec("GRANT ALL PRIVILEGES ON railway.* TO 'wordpress'@'%'");
    $pdo->exec("FLUSH PRIVILEGES");
    
    echo "✅ WordPress user created successfully!<br>";
    echo "Use these credentials in wp-config.php:<br>";
    echo "DB_USER: wordpress<br>";
    echo "DB_PASSWORD: wp_secure_123<br>";
    
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
