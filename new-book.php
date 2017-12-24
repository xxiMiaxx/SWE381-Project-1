<?php
include('config/functions.php');
if(is_admin()){
    if(isset($_POST['title']) && trim($_POST['title']) != '' &&
       isset($_POST['ISBN']) && trim($_POST['ISBN']) != '' &&
       isset($_POST['author']) && trim($_POST['author']) != '' &&
       isset($_POST['category']) && trim($_POST['category']) != '' &&
       isset($_FILES['book_image']) &&
       isset($_POST['book_desc']) && trim($_POST['book_desc']) != ''){

        $title = addslashes($_POST['title']);
        $ISBN = addslashes($_POST['ISBN']);
        if(check_isbn($ISBN) == false){
            die('ISBN already used <a href="allbooks2.php">Back</a>');
        }
        $author = addslashes($_POST['author']);
        $category = addslashes($_POST['category']);
        $book_desc = addslashes($_POST['book_desc']);
        
        $image = get_file('book_image');
        upload_image($image['fileTmp'], $image['fileName']);
        new_book($title, $ISBN, $author, $category, $book_desc, addslashes($image['fileName']));
        header('Location: allbooks2.php');

    }else{
        die('Please fill all Fields with image file <a href="allbooks2.php">Back</a>');
    }
}
?>