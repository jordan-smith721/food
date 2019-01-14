<?php
/**
 * Created by PhpStorm.
 * User: Jsmit
 * Date: 1/14/2019
 * Time: 10:07 AM
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function ()
{
    $view = new View();
    echo $view->render('views/home.html');
});

//Define a 'breakfast' route
$f3->route('GET /breakfast', function()
{
    $view = new View();
    echo $view->render('views/breakfast.html');
});

//Define a 'lunch' route
$f3->route('GET /lunch', function()
{
    $view = new View();
    echo $view->render('views/lunch.html');
});

//Define a 'pancakes' route
$f3->route('GET /breakfast/pancakes', function()
{
    $view = new View();
    echo $view->render('views/pancakes.html');
});

//Define a 'dinner' route
$f3->route('GET /dinner', function()
{
    $view = new View();
    echo $view->render('views/dinner.html');
});

//Define a 'tacos' route
$f3->route('GET /dinner/tacos', function()
{
    $view = new View();
    echo $view->render('views/tacos.html');
});

//Define a 'pizza' route
$f3->route('GET /dinner/pizza', function()
{
    $view = new View();
    echo $view->render('views/pizza.html');
});

//Define a 'steak' route
$f3->route('GET /dinner/steak', function()
{
    $view = new View();
    echo $view->render('views/steak.html');
});

//Run fat free
$f3->run();
