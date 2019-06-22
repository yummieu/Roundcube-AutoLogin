<?php

if (!file_exists('vendor/autoload.php')) {
    die('File vendor/autoload.php not found <br> Use command `docker-compose run composer "composer install" to install composer modules`');
}

require_once 'vendor/autoload.php';

if (!file_exists('.env')) {
    die('File .env not found');
}

$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$rc = new App\RoundcubeAutoLogin('http://roundebounce/');
$cookies = $rc->login(getenv('ROUNDCUBEMAIL_USERNAME'), getenv('ROUNDCUBEMAIL_PASSWORD'));

// now you can set the cookies with setcookie php function, or using any other function of a framework you are using
if (!empty($cookies))
{
    foreach($cookies as $cookie_name => $cookie_value)
    {
        setcookie($cookie_name, $cookie_value, 0, '/', '');
    }
    // and redirect to roundcube with the set cookies
    $rc->redirect(getenv('ROUNDCUBEMAIL_URL'));
}
