<?php
    require_once '../../models/Database.php';

    $db = (new Database())->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];

        // BEZPEČNÁ VERZE – připravený dotaz s pojmenovaným placeholderem
        $sql = "INSERT INTO users_demo (username) VALUES (:username)";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute(['username' => $username]);
            echo "<div style='color:green;'>Uživatelské jméno uloženo (BEZPEČNĚ – pojmenovaný placeholder)</div>";
        } catch (PDOException $e) {
            echo "<div style='color:red;'>Výjimka: " . $e->getMessage() . "</div>";
        }
    }
?>

<h2>Bezpečný formulář – demo bez SQL injection (v02)</h2>
<p><strong>Zkuste zadat do pole:</strong><br>
<code>test'); DROP TABLE users_demo; --</code><br>
Vstup bude uložen jako text, bez ohrožení databáze.</p>

<form method="post">
    <label>Uživatelské jméno:</label><br>
    <input type="text" name="username"><br><br>
    <button type="submit">Zaregistrovat</button>
</form>