require('config/database.php');
require('model/addressesses_db.php');
require('model/cities_db.php');
require('model/users_db.php');
require('view/error.php');

$city_id = filter_input(INPUT_GET, "city_id", FILTER_VALIDATE_INT);
$address_id = filter_input(INPUT_GET, "address_id", FILTER_VALIDATE_INT);
$firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
if(!$firstName)
{
    $firstName = filter_input(INPUT_GET, "firstName", FILTER_SANITIZE_STRING);
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
$zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_STRING);
if(!$zipCode)
{
    $zipCode = filter_input(INPUT_GET, "zipCode", FILTER_SANITIZE_STRING);
}
$cityId = filter_input(INPUT_POST, "cityId", FILTER_VALIDATE_INT);
if(!$cityId)
{
    $cityId = filter_input(INPUT_GET, "cityId", FILTER_VALIDATE_INT);
}
$userId = filter_input(INPUT_POST, "userId", FILTER_VALIDATE_INT);
if(!$userId)
{
    $userId = filter_input(INPUT_GET, "userId", FILTER_VALIDATE_INT);
}
$isActive = filter_input(INPUT_POST, "isActive", FILTER_VALIDATE_INT);
if(!$isActive)
{
    $isActive = filter_input(INPUT_GET, "isActive", FILTER_VALIDATE_INT);
}

$user_id = filter_input(INPUT_POST, "user_id", FILTER_VALIDATE_INT);
if(!$user_id)
{
    $user_id = filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT);
}
$userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_STRING);
if(!$userName)
{
    $userName = filter_input(INPUT_GET, "userName", FILTER_SANITIZE_STRING);
}

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);
if(!$action)
{
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
    if(!$action)
    {
        $action = 'list_addresses';
    }
}

switch($action){
    default:
        
}