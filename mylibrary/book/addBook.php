<?php

require_once "../classes/book.php";
$bookObj = new Book();

//define DONE

$book = ["title"=>"", "author"=>"", "genre"=>"", "publication_year"=>"", "publisher"=>"", "copies"=>""];
$errors = ["title"=>"", "author"=>"", "genre"=>"", "publication_year"=>"", "publisher"=>"", "copies"=>""];

//SANITAZION DONE
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $book["title"] = trim(htmlspecialchars($_POST["title"]));
    $book["author"] = trim(htmlspecialchars($_POST["author"]));
    $book["genre"] = trim(htmlspecialchars($_POST["genre"]));
    $book["publication_year"] = trim(htmlspecialchars($_POST["publication_year"]));
    $book["publisher"] = trim(htmlspecialchars($_POST["publisher"]));
    $book["copies"] = trim(htmlspecialchars($_POST["copies"]));

//VALIDATION

if (empty($book["title"])){
    $errors["title"] = "Title is required.";
} elseif ($bookObj->doesTitleExist($book["title"])){
    $errors["title"] = "This title already exists.";
}

if (empty($book["author"])){
    $errors["author"] = "Author is required.";
}

if (empty($book["genre"])){
    $errors["genre"] = "Please select a genre.";
}

if (empty($book["publication_year"])){
    $errors["publication_year"] = "The year of the Publication is required.";
}

if(empty($book["copies"]) && $book["copies"] != 0){
    $errors["copies"] = "The number of copies is required";
}elseif(!is_numeric($book["copies"]) || $book["copies"] < 1){
    $errors["copies"] = "Copies must be a number greater than 0";
}

// publication_year must not be in the future

if (empty($book["publication_year"]) || !is_numeric($book["publication_year"]) || $book["publication_year"] < 0 || $book["publication_year"] > date("Y")){
    $errors["publication_year"] = "Please enter a valid year.";
}

//If no errors, proceed to add the book

if (empty(array_filter($errors))){
    $bookObj->title = $book["title"];
    $bookObj->author = $book["author"];
    $bookObj->genre = $book["genre"];
    $bookObj->publication_year = $book["publication_year"];
    $bookObj->publisher = $book["publisher"];
    $bookObj->copies = $book["copies"];

    if ($bookObj->addBook()){
        header("Location: viewBook.php");
        exit();
    } else {
        echo "Error adding book. Please try again.";
    }
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="addBook.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
</head>
<body>
    <form action="" method = "POST">
        <h1>Fill Our Library 🪶</h1><br>
        <div container="form">
            <label>Fields with * are <strong>REQUIRED<strong></label><br><br>
            <label for="title">Title: </label>
            <input type="text" name="title" value="<?= htmlspecialchars($book["title"]) ?>">
            <p class=error><?= $errors["title"] ?> </p><br>
            <label for="author">Author: </label>
            <input type="text" name="author" value="<?= htmlspecialchars($book["author"]) ?>">
            <p class=error><?= $errors["author"] ?> </p><br>
            <label for="genre">Tell us the Genre: </label>
            <select name="genre" id="genre">
                <option value="">Select Genre</option>
                <option value="History" <?php if(isset($book["genre"]) && $book["genre"] == "History") echo "selected"; ?>>History</option>
                <option value="Science" <?php if(isset($book["genre"]) && $book["genre"] == "Science") echo "selected"; ?>>Science</option>
                <option value="Fiction" <?php if(isset($book["genre"]) && $book["genre"] == "Fiction") echo "selected"; ?>>Fiction</option>
            </select>
            <p class=error><?= $errors["genre"] ?> </p><br>
            <label for="publication_year">Publication Year: </label>
            <input type="text" name="publication_year" value="<?= htmlspecialchars($book["publication_year"]) ?>">
            <p class=error><?= $errors["publication_year"] ?> </p><br>
            <label for="publisher">Publisher: </label>
            <input type="text" name="publisher" value="<?= htmlspecialchars($book["publisher"]) ?>"><br><br>
            <label for="copies">Copies: </label>
            <input type="text" name="copies" value="<?= htmlspecialchars($book["copies"]) ?>">
            <p class=error><?= $errors["copies"] ?> </p><br>
            <button type="submit">Add Book</button>
        </div>
</body>
</html>