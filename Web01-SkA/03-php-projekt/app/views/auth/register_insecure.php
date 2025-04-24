<?php
    require_once '../../models/Database.php';

    $db = (new Database())->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];

        // VULNERABLE SQL (špatně)
        $sql = "INSERT INTO users_demo (username) VALUES ('$username')";

        try {
            $db->exec($sql);
            echo "<div style='color:green;'>Uživatelské jméno uloženo (NECHRÁNĚNO)</div>";
        } catch (PDOException $e) {
            echo "<div style='color:red;'>Výjimka: " . $e->getMessage() . "</div>";
        }
    }
?>

<h2>Zranitelný formulář – demo SQL injection</h2>
<p><strong>Zkuste zadat do pole:</strong><br>
<code>test'); DROP TABLE users_demo; --</code></p>

<form method="post">
    <label>Uživatelské jméno:</label><br>
    <input type="text" name="username"><br><br>
    <button type="submit">Zaregistrovat</button>
</form>