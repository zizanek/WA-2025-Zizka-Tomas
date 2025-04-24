<?php
    require_once '../../models/Database.php';

    $db = (new Database())->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];

        // BEZPEČNÁ VERZE – připravený dotaz s anonymním placeholderem
        $sql = "INSERT INTO users_demo (username) VALUES (?)";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$username]);
            echo "<div style='color:green;'>Uživatelské jméno uloženo (BEZPEČNĚ)</div>";
        } catch (PDOException $e) {
            echo "<div style='color:red;'>Výjimka: " . $e->getMessage() . "</div>";
        }
    }
?>

<h2>Bezpečný formulář – demo bez SQL injection (v01)</h2>
<p><strong>Zkuste zadat do pole:</strong><br>
<code>test'); DROP TABLE users_demo; --</code><br>
Výsledkem bude pouze vložení jména jako text, tabulka zůstane nedotčena.</p>

<form method="post">
    <label>Uživatelské jméno:</label><br>
    <input type="text" name="username"><br><br>
    <button type="submit">Zaregistrovat</button>
</form>