<?php

class Book {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($title, $author, $category, $subcategory, $year, $price, $isbn, $description, $link, $images, $user_id) {

        // Vkládáme i user_id, abychom měli vazbu na uživatele
        $sql = "INSERT INTO books (
                    title, author, category, subcategory, year, price, isbn, description, link, images, user_id
                ) VALUES (
                    :title, :author, :category, :subcategory, :year, :price, :isbn, :description, :link, :images, :user_id
                )";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $title,
            ':author' => $author,
            ':category' => $category,
            ':subcategory' => $subcategory ?: null,
            ':year' => $year,
            ':price' => $price,
            ':isbn' => $isbn,
            ':description' => $description,
            ':link' => $link,
            ':images' => json_encode($images),
            ':user_id' => $user_id
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM books ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $author, $category, $subcategory, $year, $price, $isbn, $description, $link) {
        $sql = "UPDATE books 
                SET title = :title,
                    author = :author,
                    category = :category,
                    subcategory = :subcategory,
                    year = :year,
                    price = :price,
                    isbn = :isbn,
                    description = :description,
                    link = :link
                WHERE id = :id";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':author' => $author,
            ':category' => $category,
            ':subcategory' => $subcategory,
            ':year' => $year,
            ':price' => $price,
            ':isbn' => $isbn,
            ':description' => $description,
            ':link' => $link
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }



}