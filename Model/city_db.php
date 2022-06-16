<?php 
require('config/database.php');
    function get_cities() {
        global $db;
        $query = 'SELECT * FROM tbl_cities ORDER BY city_id';
        $statement = $db->prepare($query);
        $statement->execute();
        $cities = $statement->fetchAll();
        $statement->closeCursor();
        return $cities;
    }

    function get_city_name($city_id) {
        if (!$city_id) {
            return "All cities";
        }
        global $db;
        $query = 'SELECT * FROM tbl_cities WHERE city_id = :city_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':city_id', $city_id);
        $statement->execute();
        $city = $statement->fetch();
        $statement->closeCursor();
        $city_name = $city['city_name'];
        return $city_name;
    }

    function delete_city($city_id) {
        global $db;
        $query = 'DELETE FROM tbl_cities WHERE city_id = :city_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':city_id', $city_id);
        $statement->execute();
        $statement->closeCursor();
    }


    function add_city($city_name, $county, $country){
        global $db;
        $query='INSERT INTO tbl_cities (city_name, county, country) VALUES (:city_name, :county, :country);';
        $statement = $db->prepare($query);
        $statement->bindValue(':city_name',$city_name);
        $statement->bindValue(':county',$county);
        $statement->bindValue(':country',$country);
        $statement->execute();
        $statement->closeCursor();
    }