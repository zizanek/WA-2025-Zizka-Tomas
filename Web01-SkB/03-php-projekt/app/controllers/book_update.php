<?php
    require_once '../models/Database.php';
    require_once '../models/Book.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $title = htmlspecialchars($_POST['title']);
        $author = htmlspecialchars($_POST['author']);
        $category = htmlspecialchars($_POST['category']);
        $subcategory = !empty($_POST['subcategory']) ? htmlspecialchars($_POST['subcategory']) : null;
        $year = intval($_POST['year']);
        $price = floatval($_POST['price']);
        $isbn = htmlspecialchars($_POST['isbn']);
        $description = htmlspecialchars($_POST['description']);
        $link = htmlspecialchars($_POST['link']);

        $db = (new Database())->getConnection();
        $bookModel = new Book($db);

        $success = $bookModel->update(
            $id,
            $title,
            $author,
            $category,
            $subcategory,
            $year,
            $price,
            $isbn,
            $description,
            $link
        );

        if ($success) {
            header("Location: ../views/books/books_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }