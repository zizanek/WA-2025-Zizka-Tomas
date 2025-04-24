<?php
$comment = $_POST['comment'] ?? '';
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>XSS zranitelná verze</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-danger">Zranitelná verze</h2>
    <p><strong>Zkuste zadat:</strong> <code>&lt;script&gt;alert('XSS')&lt;/script&gt;</code></p>

    <form method="post">
        <div class="mb-3">
            <label for="comment" class="form-label">Komentář:</label>
            <textarea name="comment" id="comment" class="form-control" rows="3"><?= $comment ?></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Odeslat</button>
    </form>

    <?php if ($comment): ?>
        <h4 class="mt-4">Výpis komentáře:</h4>
        <div class="border p-3 bg-white"><?= $comment ?></div>
    <?php endif; ?>
</div>

</body>
</html>