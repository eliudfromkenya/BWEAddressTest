<?php 
function get_city_by_city_id($city_id){
    global $db;
    $query='SELECT city_name,county, country FROM tbl_cities WHERE city_id = :city_id; ';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_id',$city_id);
    $statement->execute();
    $cities = $statement->fetchAll();
    $statement->closeCursor();
    return $cities;
}

function get_city_name($city_id){
    global $db;
    $query='SELECT city_name FROM tbl_cities WHERE city_id = :city_id; ';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_id',$city_id);
    $statement->execute();
    $city = $statement->fetchAll();
    $statement->closeCursor();
    $city_name = $city['city_name'];
    return $city_name;
}

function get_all_cities(){
    global $db;
    $query='SELECT city_id,city_name,county, country FROM tbl_cities; ';
    $statement = $db->prepare($query);
    $statement->execute();
    $cities = $statement->fetchAll();
    $statement->closeCursor();
    return $cities;
}


function delete_city($city_id){
    global $db;
    $query='DELETE FROM tbl_cities WHERE tbl_cities.city_id = :city_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_id',$city_id);
    $statement->execute();
    $statement->closeCursor();
}


function add_city($cityName, $county, $country){
    global $db;
    $query='INSERT INTO tbl_cities (city_name, county, country) VALUES (:city_name, :county, :country);';
    $statement = $db->prepare($query);
    $statement->bindValue(':city_name',$cityName);
    $statement->bindValue(':county',$county);
    $statement->bindValue(':country',$country);
    $statement->execute();
    $statement->closeCursor();
}
