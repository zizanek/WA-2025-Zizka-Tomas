<?php

class Book {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($title, $author, $category, $subcategory, $year, $price, $isbn, $description, $link, $images) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO books (title, author, category, subcategory, year, price, isbn, description, link, images) 
                VALUES (:title, :author, :category, :subcategory, :year, :price, :isbn, :description, :link, :images)";
        
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
            ':images' => json_encode($images) // Ukládání obrázků jako JSON
        ]);
    }
}