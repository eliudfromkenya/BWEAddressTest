<?php 
require('config/database.php');

    function get_addresses_by_city($city_id) {
        global $db;
        Alert($city_id);
        if ($city_id) {
            $query = 'SELECT * FROM vw_addresses A WHERE A.city_id = :city_id ORDER BY address_id';
        } else {
            $query = 'SELECT * FROM vw_addresses C ORDER BY C.city_id';
        }
        $statement = $db->prepare($query);
        if ($city_id) {
            $statement->bindValue(':city_id', $city_id);
        }
        $statement->execute();
        $addresses = $statement->fetchAll();
        $statement->closeCursor();
        return $addresses;
    }

    function export_to_address($city_id) {
        global $db;

        if ($city_id) {
            $query = 'SELECT * FROM vw_addresses A WHERE A.city_id = :city_id ORDER BY address_id';
        } else {
            $query = 'SELECT * FROM vw_addresses C ORDER BY C.city_id';
        }
        $statement = $db->prepare($query);
        if ($city_id) {
            $statement->bindValue(':city_id', $city_id);
        }
        $statement->execute();
        $addresses = $statement->fetchAll();
        $statement->closeCursor();

        file_put_contents('myfile.json', json_encode($addresses));
        return $addresses;
    }


    function delete_address($address_id){
        global $db;
        Alert($address_id);
        $query='DELETE FROM tbl_addresses WHERE tbl_addresses.address_id = :address_id;';
        $statement = $db->prepare($query);
        $statement->bindValue(':address_id',$address_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function save_address($name, $first_name, $email, $street, $zip_code, $city_id, $user_id, $address_id){
        global $db;
        $query='INSERT INTO tbl_addresses (`name`, first_name, email, street, zip_code, city_id, user_id) VALUES (:name, :first_name, :email, :street, :zip_code, :city_id, 1);';
        Alert($is_updating);
        $statement = $db->prepare($query);
        // $statement->bindValue(':user_id',$user_id);
        $statement->bindValue(':name',$name);
        $statement->bindValue(':first_name',$first_name);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':street',$street);
        $statement->bindValue(':zip_code',$zip_code);
        $statement->bindValue(':city_id',$city_id);
        $statement->execute();
        $statement->closeCursor();
    }

    