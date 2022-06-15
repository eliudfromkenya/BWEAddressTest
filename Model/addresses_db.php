<?php 
function get_all_address($user_id){
    global $db;
    $query='SELECT  address_id,`name`,first_name,email,street,zip_code,city_name,country,owner_username,owner_name FROM  vw_addresses WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id',$user_id);
    $statement->execute();
    $addresses = $statement->fetchAll();
    $statement->closeCursor();
    return $addresses;
}

function delete_address($address_id){
    global $db;
    $query='DELETE FROM tbl_addresses WHERE tbl_addresses.address_id = :address_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id',$address_id);
    $statement->execute();
    $statement->closeCursor();
}


function add_address($name, $firstName, $email, $street, $zipCode, $cityId, $userId){
    global $db;
    $query='INSERT INTO tbl_addresses (`name`, first_name, email, street, zip_code, city_id, user_id) VALUES (:name, :first_name, :email, :street, :zip_code, :city_id, :user_id);';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id',$userId);
    $statement->bindValue(':name',$name);
    $statement->bindValue(':first_name',$firstName);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':street',$street);
    $statement->bindValue(':zip_code',$zipCode);
    $statement->bindValue(':city_id',$cityId);
    $statement->execute();
    $statement->closeCursor();
}
