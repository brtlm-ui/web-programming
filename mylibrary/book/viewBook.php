<?php

require_once "../classes/book.php";
$bookObj = new Book();

$search = $genre = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $search = isset($_GET["search"])? trim(htmlspecialchars($_GET["search"])) : "";
    $genre = isset($_GET["genre"])? trim(htmlspecialchars($_GET["genre"])) : "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewBook.css">
    <title>View Library</title>
</head>
<body>
    <h1>Library</h1>
    <form action="" method="get">
        <label for="">Search:</label>
        <input type="search" name="search" id="search" value="<?= $search ?>">
        <select name="genre" id="genre">
                <option value="">All</option>
                <option value="History" <?php if(isset($genre) && $genre == "History") echo "selected"; ?>>History</option>
                <option value="Science" <?php if(isset($genre) && $genre  == "Science") echo "selected"; ?>>Science</option>
                <option value="Fiction" <?php if(isset($genre) && $genre  == "Fiction") echo "selected"; ?>>Fiction</option>
            </select>
        <input type="submit" value="Search">
    </form>
    <button><a href="addBook.php">Add Book +</a></button>
    <table border=1>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Publication Year</th>
            <th>Publisher</th>
            <th>Copies</th>
        </tr>
        <?php
        $no = 1;
        foreach($bookObj->viewBook($search, $genre) as $book){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $book["title"]; ?></td>
            <td><?php echo $book["author"]; ?></td>
            <td><?php echo $book["genre"]; ?></td>
            <td><?php echo $book["publication_year"]; ?></td>
            <td><?php echo $book["publisher"]; ?></td>
            <td><?php echo $book["copies"]; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
