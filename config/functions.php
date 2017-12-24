<?php
include('db.php');

function login($user, $pass){
    $user = selectSql('select * from users where (Name = "' . $user . '" or email = "' . $user . '") and Password = "' . $pass . '"');
    return $user;
}

function check_email($email){
    $mail = selectSql('select * from users where email = "'. $email .'"');
    if($mail != false){
        return false;
    }else{
        return true;
    }
}


function get_book_info($id){
  $bkscat = selectSql("select * from books where id ='" .$id. "'" );
  if($bkscat  != false){
      return $bkscat;
  }else{
      return [];
  }
}


function check_isbn($isbn){
    $book = selectSql('select * from books where ISBN = "'. $isbn .'"');
    if($book != false){
        return false;
    }else{
        return true;
    }
}

function get_not($id)
{
$msg=selectSql("select noti_book, noti_msg from noti where noti_user={$id}");
if($msg!=false)
return $msg;
else [];
}

function check_catg($cat){
    $catu = selectSql('select * from categories where cat_name = "'. $cat .'"');
    if($catu != false){
        return false;
    }else{
        return true;
    }
}

function check_login_status(){
    @session_start();
    if(isset($_SESSION['username']) && trim($_SESSION['username']) != '' && isset($_SESSION['password']) && trim($_SESSION['password']) != '' && isset($_SESSION['panel']) && trim($_SESSION['panel']) != ''){
        return ['panel' => $_SESSION['panel']];
    }else if(isset($_COOKIE['username']) && trim($_COOKIE['username']) != '' && isset($_COOKIE['password']) && trim($_COOKIE['password']) != '' && isset($_COOKIE['panel']) && trim($_COOKIE['panel']) != ''){
        return ['panel' => $_COOKIE['panel']];
    }else{
        return false;
    }

}

function get_books_count_in_cat($cat_id){
    $books = selectSql('select * from books where categoryID = ' . intval($cat_id));
    if($books != false){
        return count($books);
    }else{
        return 0;
    }

}


function countbooks(){
    $books = selectSql('select * from books');
    if($books != false){
        return count($books);
    }else{
        return 0;
    }

}

function countbooksissued(){
    $books = selectSql('select * from books where status = 0');
    if($books != false){
        return count($books);
    }else{
        return 0;
    }

}

function countcat(){
    $books = selectSql('select * from categories');
    if($books != false){
        return count($books);
    }else{
        return 0;
    }

}

function countmembs(){
    $books = selectSql('select * from users where type = 1');
    if($books != false){
        return count($books);
    }else{
        return 0;
    }

}

function get_all_cats(){
    $cats = selectSql('select * from categories');
    if($cats != false){
        return $cats;
    }else{
        return [];
    }
}





function get_books($cat_id, $page = 0, $count = 99999999){
    $from_limit = $page * $count;
    $to_limit = $count;
    if($cat_id != '0')
        $books = selectSql('select categories.* , books.* from books inner join categories on books.categoryID = categories.ID where categories.ID = ' . $cat_id . " limit {$from_limit}, {$to_limit}");
    else
        $books = selectSql("select categories.* , books.* from books inner join categories on books.categoryID = categories.ID limit {$from_limit}, {$to_limit}");
    if($books != false){
        return $books;
    }else{
        return [];
    }
}

function is_admin(){

    @session_start();
    if((isset($_SESSION['type']) && $_SESSION['type'] == 'admin') || (isset($_COOKIE['type']) && $_COOKIE['type'] == 'admin')){
        return true;
    }else{
        return false;
    }

}

function new_bookRequest($bookname, $user){
    if(check_login_status()){
        executeSql("insert into requests (bookname, u_id) values('{$bookname}','{$user}')");
    }else {
      echo "request denied";
    }
}




function del_book($b_id){
    @session_start();
    if(is_admin()){
        executeSql('delete from books where id = ' . intval($b_id));
    }
}

function new_book($title, $isbn, $author, $category, $book_desc, $img){
    if(is_admin()){
        executeSql("insert into books (title, ISBN, author, categoryID, book_desc, image_url) values('{$title}','{$isbn}','{$author}','{$category}','{$book_desc}', '{$img}')");
    }
}



function return_Book($book, $user){

executeSql("INSERT INTO history (b_id, u_id) VALUES('{$book}','{$user}')");
executeSql('delete from currently where b_id = ' . $book);
executeSql('UPDATE books SET status = "0" WHERE id = "'. $book .'"') ;

  }




function new_catg($name){

        executeSql("INSERT INTO categories(cat_name) VALUES('{$name}')");


}

function new_issue($dueD, $book, $user, $issueD ){

        executeSql("INSERT INTO currently (cur_due, b_id, u_id, issued_date) VALUES('{$dueD}','{$book}','{$user}','{$issueD}')");


}

function get_all_bks(){
    $bks = selectSql('select * from books where status = 1');
    if($bks != false){
        return $bks;
    }else{
        return [];
    }
}


function get_all_rqs(){
    $bks = selectSql('select * from requests');
    if($bks != false){
        return $bks;
    }else{
        return [];
    }}



function get_all_bkscat($id){
    $bkscat = selectSql("select * from books where categoryID ='" . $id['ID'] . "'" );
    if($bkscat  != false){
        return $bkscat;
    }else{
        return [];
    }
}




function get_all_mmbs(){
    $mmbs = selectSql('select * from users where type != 1');
    if($mmbs != false){

        return $mmbs;
    }else{
        return [];
    }
}

function get_book_by_id2($id){
    $book = selectSql("select title from books where books.id = {$id}");
    return $book;
}

function get_bookInfo_by_id($id){
    $book = selectSql("select title, author, ISBN, status, book_desc, image_url from books where books.id = {$id}");
    return $book;
}



function get_book_by_id($id){
    $book = selectSql("select categories.* , books.* from books inner join categories on books.categoryID = categories.ID where books.id = {$id}");
    return $book;
}

function changestatus($value){

   executeSql('UPDATE books SET status = "1" WHERE id = "'. $value .'"') ;

}

function edit_book($info){
    $sql = "update books set title = '". $info['title'] ."', author = '". $info['author'] ."', ISBN = '". $info['ISBN'] ."', categoryID = '". $info['categoryID'] ."', book_desc = '". $info['book_desc'] ."', image_url = '". $info['image_url'] ."' where id = '". $info['id'] ."'";
    executeSql($sql);
}

function upload_image($tmp_name, $new_name, $dist = false){
    if($dist == false)
    //images/books/
        $img_dir = '';
    else
        $img_dir = $dist;
    move_uploaded_file($tmp_name, $img_dir . $new_name);
}


function get_file($input_name){
    $info = [];
    $file = $_FILES[$input_name];
    // file name
    $info['fileName'] = $file['name'];
    // file tmp name
    $info['fileTmp'] = $file['tmp_name'];
    // file size
    $info['fileSize'] = $file['size'];
    // file type
    $info['fileType'] = $file['type'];
    // errors
    $info['fileError'] = $file['error'];
    return $info;
}


function get_all_members($page, $count){
    $from_limit = $page * $count;
    $to_limit = $count;
    $members = selectSql("select * from users limit {$from_limit}, {$to_limit}");
    if($members != false){
        return $members;
    }else{
        return [];
    }
}

function update_date($date,$b_id){
    $sql = "update currently set cur_due = '". $date ."'where b_id='".$b_id."'";
    executeSql($sql);
}



function get_memeber_by_id($id){
    $user = selectSql("select * from users where id = {$id}");
    return $user;
}

function edit_profile($info){
    $sql = "update users set Name = '". $info['Name'] ."', email = '". $info['email'] ."', Password = '". $info['Password'] ."', image = '". $info['image'] ."' where ID = '". $info['ID'] ."'";
    executeSql($sql);
}

function get_cur($u_id){
    $sql = 'select users.*, books.*, currently.* from currently inner join users on currently.u_id = users.ID inner join books on books.id = currently.b_id where users.ID = ' . $u_id;
    if(selectSql($sql) != false)
        return selectSql($sql);
    else
        return [];
}

function get_his($u_id){
    $sql = 'select users.*, books.*, history.* from history inner join users on history.u_id = users.ID inner join books on books.id = history.b_id where users.ID = ' . $u_id;
    if(selectSql($sql) != false)
        return selectSql($sql);
    else
        return [];
}

function send_noti($u, $b){
    executeSql('insert into noti (noti_user, noti_book) values("'. $u .'","'. $b .'")');
}



function my_id(){
    @session_start();
    if(isset($_COOKIE['id'])){
        $id = $_COOKIE['id'];

    }elseif(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }

    return $id;
}



function logout(){
    @session_start();
    session_destroy();
    setcookie('username', null, -1 , '/');
    setcookie('password', null, -1 , '/');
    setcookie('panel', null, -1 , '/');
    header('Location: .');
}




?>
