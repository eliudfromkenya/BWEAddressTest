<?php 
function get_address_city_id($user_id){
    global $db;
    $query='SELECT city_name,county, country FROM tbl_cities WHERE city_id = :city_id; ';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_id',$city_id);
    $statement->execute();
    $addresses = $statement->fetchAll();
    $statement->closeCursor();
    return $addresses;
}

function get_city_name($city_id){
    global $db;
    $query='SELECT city_name FROM tbl_cities WHERE city_id = :city_id; ';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_id',$city_id);
    $statement->execute();
    $address = $statement->fetchAll();
    $statement->closeCursor();
    $address_name = $address['city_name'];
    return $address_name;
}

function get_all_address(){
    global $db;
    $query='SELECT city_id,city_name,county, country FROM tbl_cities; ';
    $statement = $db->prepare($query);
    $statement->execute();
    $addresses = $statement->fetchAll();
    $statement->closeCursor();
    return $addresses;
}


function delete_address($city_id){
    global $db;
    $query='DELETE FROM tbl_cities WHERE tbl_cities.city_id = :city_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_id',$city_id);
    $statement->execute();
    $statement->closeCursor();
}


function add_address($cityName, $county, $country){
    global $db;
    $query='INSERT INTO tbl_cities (city_name, county, country) VALUES (:city_name, :county, :country);';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_name',$cityName);
    $statement->bindValue(':county',$county);
    $statement->bindValue(':country',$country);
    $statement->execute();
    $statement->closeCursor();
}
