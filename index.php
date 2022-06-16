<?php
    require('config/database.php');
    require('model/address_db.php');
    require('model/city_db.php');


$is_updating = filter_input(INPUT_POST, "is_updating", FILTER_VALIDATE_INT);
if(!$is_updating)
{
    $is_updating = filter_input(INPUT_GET, "is_updating", FILTER_VALIDATE_INT);
}

$country = filter_input(INPUT_POST, "country", FILTER_SANITIZE_STRING);
if(!$country)
{
    $country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
}
$county = filter_input(INPUT_POST, "county", FILTER_SANITIZE_STRING);
if(!$county)
{
    $county = filter_input(INPUT_GET, "county", FILTER_SANITIZE_STRING);
}

$first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_STRING);
if(!$first_name)
{
    $first_name = filter_input(INPUT_GET, "first_name", FILTER_SANITIZE_STRING);
}
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
if(!$name)
{
    $name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_STRING);
}
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
if(!$email)
{
    $email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_STRING);
}
$street = filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING);
if(!$street)
{
    $street = filter_input(INPUT_GET, "street", FILTER_SANITIZE_STRING);
}
$zip_code = filter_input(INPUT_POST, "zip_code", FILTER_SANITIZE_STRING);
if(!$zip_code)
{
    $zip_code = filter_input(INPUT_GET, "zip_code", FILTER_SANITIZE_STRING);
}
$user_id = filter_input(INPUT_POST, "user_id", FILTER_VALIDATE_INT);
if(!$user_id)
{
    $user_id = filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT);
}
$isActive = filter_input(INPUT_POST, "isActive", FILTER_VALIDATE_INT);
if(!$isActive)
{
    $isActive = filter_input(INPUT_GET, "isActive", FILTER_VALIDATE_INT);
}
$user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_STRING);
if(!$user_name)
{
    $user_name = filter_input(INPUT_GET, "user_name", FILTER_SANITIZE_STRING);
}
    $city_name = filter_input(INPUT_POST, 'city_name', FILTER_SANITIZE_STRING);

    $city_id = filter_input(INPUT_POST, "city_id", FILTER_SANITIZE_STRING);
    if(!$city_id)
    {
        $city_id = filter_input(INPUT_GET, "city_id", FILTER_SANITIZE_STRING);
    }

    $address_id = filter_input(INPUT_POST, "address_id", FILTER_SANITIZE_STRING);
    if(!$address_id)
    {
        $address_id = filter_input(INPUT_GET, "address_id", FILTER_SANITIZE_STRING);
    }

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {      
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_addresses'; // assigning default value if NULL or FALSE
        }
    }

    switch($action) {       
        case "list_cities": 
             $cities = get_cities();
            include('view/city_list.php');
            break;
        case "add_city":
            add_city($city_name, $county, $country);
            header("Location: .?action=list_cities");
            break;
        case "save_address":
            if ($city_id && $name && $email && $street && $zip_code) {
                save_address($name, $first_name, $email, $street, $zip_code, $city_id, $user_id, $address_id);
                header("Location: .?city_id=$city_id");
            } else {
                $error = "Invalid address data. Check all fields and try again.";
                include('view/error.php');
                exit();
            }
            break;
        case "delete_city":
            if ($city_id) {
                try {
                    delete_city($city_id);
                } catch (PDOException $e) {
                    $error = "You cannot delete a city if addresses exist for it.";
                    include('view/error.php');
                    exit();
                }
                header("Location: .?action=list_cities");
            }
            break;
        case "delete_address":
              if ($address_id) {
                delete_address($address_id);
                header("Location: .?city_id=$city_id");
            } else {
                $error = "Missing or incorrect address id.";
                include('view/error.php');
            }
            break;
        default:           
            $city_name = get_city_name($city_id);
            $cities = get_cities();
            $addresses = get_addresses_by_city($city_id);
            include('view/address_list.php');
    }

    function Alert($msg){
        echo "<script> alert('$msg');</script>";
    }

    