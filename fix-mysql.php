<?php
echo "<h2>Fixing MySQL Root Permissions</h2>";
echo "<p>Attempting to fix database connection...</p>";

$host = 'mysql-68305d35.railway.internal';
$password = 'oTRpSwMtEuexbxlGHUdJeVvNCXRuoKuQ';

try {
    echo "<strong>Step 1:</strong> Connecting to MySQL...<br>";
    $pdo = new PDO("mysql:host=$host;", 'root', $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connected successfully!<br><br>";
    
    echo "<strong>Step 2:</strong> Current users:<br>";
    $stmt = $pdo->query("SELECT user, host FROM mysql.user WHERE user='root'");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- root@{$row['host']}<br>";
    }
    echo "<br>";
    
    echo "<strong>Step 3:</strong> Recreating database...<br>";
    $pdo->exec("DROP DATABASE IF EXISTS railway");
    $pdo->exec("CREATE DATABASE railway CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✅ Database 'railway' recreated<br><br>";
    
    echo "<strong>Step 4:</strong> Fixing root permissions...<br>";
    $pdo->exec("GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '$password' WITH GRANT OPTION");
    $pdo->exec("GRANT ALL PRIVILEGES ON railway.* TO 'root'@'%'");
    $pdo->exec("GRANT ALL PRIVILEGES ON railway.* TO 'root'@'localhost' IDENTIFIED BY '$password'");
    $pdo->exec("FLUSH PRIVILEGES");
    echo "✅ Root permissions updated<br><br>";
    
    echo "<strong>Step 5:</strong> Testing connection to railway database...<br>";
    $pdo2 = new PDO("mysql:host=$host;dbname=railway", 'root', $password);
    echo "✅ Successfully connected to 'railway' database<br><br>";
    
    echo "<div style='background: #d4edda; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px;'>";
    echo "<h3>🎉 SUCCESS!</h3>";
    echo "<p>Database connection has been fixed!</p>";
    echo "<p><strong>WordPress should now show the installation screen.</strong></p>";
    echo "<p><a href='/' style='background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px;'>Go to WordPress Installation</a></p>";
    echo "</div>";
    
} catch(PDOException $e) {
    echo "<div style='background: #f8d7da; padding: 15px; border: 1px solid #f5c6cb; border-radius: 5px;'>";
    echo "<h3>❌ Error occurred:</h3>";
    echo "<p><strong>Error:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Error Code:</strong> " . $e->getCode() . "</p>";
    echo "</div>";
}
?>
