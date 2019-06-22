<?php

$config = require 'config.php';

require 'RoundcubeAutoLogin.php';

$rc = new App\RoundcubeAutoLogin('http://roundebounce/');
$cookies = $rc->login($config['email'], $config['password']);

// now you can set the cookies with setcookie php function, or using any other function of a framework you are using
if (!empty($cookies))
{
    foreach($cookies as $cookie_name => $cookie_value)
    {
        setcookie($cookie_name, $cookie_value, 0, '/', '');
    }
    // and redirect to roundcube with the set cookies
    $rc->redirect($config['roundcube_url']);
}
