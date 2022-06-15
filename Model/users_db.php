<?php 
function get_all_users(){
    global $db;
    $query='SELECT  user_id,`name`,user_name,is_active FROM  tbl_users';
    $statement = $db->prepare($query);
    $statement->execute();
    $addresses = $statement->fetchAll();
    $statement->closeCursor();
    return $addresses;
}

function delete_user($user_id){
    global $db;
    $query='DELETE FROM tbl_users WHERE tbl_users.user_id = :user_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id',$user_id);
    $statement->execute();
    $statement->closeCursor();
}


function add_user($name, $userName, $is_active){
    global $db;
    $query='INSERT INTO tbl_users (`name`, user_name, is_active) VALUES (:name, :user_name, :is_active);';
    $statement = $db->prepare($query);
    $statement->bindValue(':name',$name);
    $statement->bindValue(':user_name',$userName);
    $statement->bindValue(':is_active',$is_active);
    $statement->execute();
    $statement->closeCursor();
}
