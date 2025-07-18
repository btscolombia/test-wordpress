<?php
echo "<h2>Creating WordPress MySQL User</h2>";

$host = 'mysql-68305d35.railway.internal';
$root_password = 'oTRpSwMtEuexbxlGHUdJeVvNCXRuoKuQ';
$wp_user = 'wordpress';
$wp_password = 'wp_secure_123';

try {
    // Conectar como root
    echo "1. Connecting to MySQL as root...<br>";
    $pdo = new PDO("mysql:host=$host;", 'root', $root_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connected as root<br><br>";
    
    // Ver usuarios actuales
    echo "2. Current users:<br>";
    $stmt = $pdo->query("SELECT user, host FROM mysql.user");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- {$row['user']}@{$row['host']}<br>";
    }
    echo "<br>";
    
    // Crear usuario WordPress
    echo "3. Creating WordPress user...<br>";
    $pdo->exec("CREATE USER IF NOT EXISTS '$wp_user'@'%' IDENTIFIED BY '$wp_password'");
    echo "✅ User '$wp_user' created<br>";
    
    // Otorgar permisos
    echo "4. Granting permissions...<br>";
    $pdo->exec("GRANT ALL PRIVILEGES ON railway.* TO '$wp_user'@'%'");
    $pdo->exec("FLUSH PRIVILEGES");
    echo "✅ Permissions granted<br><br>";
    
    // Verificar permisos
    echo "5. Verification:<br>";
    $stmt = $pdo->query("SHOW GRANTS FOR '$wp_user'@'%'");
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        echo "- {$row[0]}<br>";
    }
    echo "<br>";
    
    // Probar conexión con el nuevo usuario
    echo "6. Testing new user connection...<br>";
    $test_pdo = new PDO("mysql:host=$host;dbname=railway", $wp_user, $wp_password);
    echo "✅ WordPress user can connect successfully!<br><br>";
    
    echo "<strong>SUCCESS! Use these credentials in wp-config.php:</strong><br>";
    echo "DB_USER: $wp_user<br>";
    echo "DB_PASSWORD: $wp_password<br>";
    
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
    
    // Si falla, intentar conectar directamente con root@localhost
    echo "<br>Trying alternative connection...<br>";
    try {
        $pdo2 = new PDO("mysql:host=$host;", 'root', $root_password, [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=''"
        ]);
        echo "Alternative connection works<br>";
    } catch(PDOException $e2) {
        echo "Alternative also failed: " . $e2->getMessage();
    }
}
?>
