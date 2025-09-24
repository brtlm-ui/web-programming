<?php

require_once "database.php"; // include database connection (can also use require_once or include_once)

class book extends Database {
    // Properties (product fields)
    public $id = "";
    public $title = "";
    public $author = "";
    public $genre = "";
    public $publication_year = "";
    public $publisher = "";
    public $copies = "";

    // Add a new product to the database
    public function addBook() {
        // SQL with placeholders (to prevent SQL injection)
        $sql = "INSERT INTO book (title, author, genre, publication_year, publisher, copies) VALUES (:title, :author, :genre, :publication_year, :publisher, :copies)";

        // Prepare the statement
        $query = $this->connect()->prepare($sql);

        // Bind parameters to class properties
        $query->bindParam(":title", $this->title);
        $query->bindParam(":author", $this->author);
        $query->bindParam(":genre", $this->genre);
        $query->bindparam(":publication_year", $this->publication_year);
        $query->bindparam(":publisher", $this->publisher);
        $query->bindparam(":copies", $this->copies);

        // Execute the statement
        return $query->execute();
    }

    public function viewBook($search="", $genre="") {

        $sql = "SELECT * FROM book WHERE title LIKE CONCAT('%', :search, '%') AND genre LIKE CONCAT('%', :genre, '%') ORDER BY title ASC";
        $query = $this->connect()->prepare($sql);         
        $query->bindParam(":search", $search);
        $query->bindParam(":genre", $genre);

        if ($query->execute()) {
            return $query->fetchAll();
        } else {
            return null;
        }
    }

    public function doesTitleExist($btitle){
        $sql = "SELECT COUNT(*) as total FROM book WHERE title = :title";
        $query = $this->connect()->prepare($sql);
        $query->bindParam(":title", $btitle);
        $record = null;
        if ($query->execute()) {
            $record = $query->fetch();
        }

        if($record["total"] > 0){
            return true;
        }else{
            return false;
        }
    }
}


