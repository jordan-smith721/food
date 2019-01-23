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

$f3->route('GET /', function($f3)
{
   //save variables
    $f3->set('username', 'jshmo');
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'Working with templates');
    $f3->set('temp', 67);
    $f3->set('radius', 10);

    //load template
    //$template = new Template();
    //echo $template->render('views/info.html');

    //alternate syntax for above
    echo Template::instance()->render('views/info.html');
});


/*
//Define a default route
$f3->route('GET /', function ()
{
    $view = new View();
    echo $view->render('views/home.html');
});

*/

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

//define a route with a parameter
$f3->route('GET /@food', function($f3, $params)
{
   echo "<h3>I like " . $params['food'] . "</h3>";
});

//define a route with multiple parameters
$f3->route('GET /@meal/@food', function($f3, $params)
{

    $validMeals = ['breakfast', 'lunch', 'dinner'];
    $meal = $params['meal'];
    //check validity
    if(!in_array($meal, $validMeals))
    {
            echo "<h3> Sorry, we don't serve $meal</h3>";
    }
    else
    {
        switch($meal)
        {
            case 'breakfast':
                $time = " in the morning";
                break;
            case 'lunch':
                $time = "at noon";
                break;
            case 'dinner':
                $time = "in the evening";
        }

        echo "<h3>I like " . $params['food'] . " $time</h3>";
    }
});

//Define an order form route
$f3->route('GET /order', function()
{
    $view = new View();
    echo $view->render('views/form1.html');
});

//Define an order-process route
$f3->route('POST /order-process', function($f3)
{
    $food = $_POST['food'];
    echo "You ordered $food";

    if ($food == 'pizza')
    {
        //reroute to pizza page
        $f3->reroute("dinner/pizza");
    }
    elseif($food == 'steak')
    {
        //reroute to pizza page
        $f3->reroute("dinner/steak");
    }
    elseif($food == 'tacos')
    {
        //reroute to pizza page
        $f3->reroute("dinner/tacos");
    }
    else
    {
        $f3->reroute("");
    }
});

//Define a dessert route
$f3->route('GET /dessert/@dessert', function($f3, $params)
{
    $dessert = $params['dessert'];

    if($dessert == 'pie')
    {
        $view = new View();
        echo $view->render('views/pie.html');
    }
    elseif($dessert == 'cake' OR $dessert == 'cookies' OR $dessert == 'brownies')
    {
        echo "<h3>I like $dessert";
    }
    else
    {
        $f3->error(404);
    }
});


//Run fat free
$f3->run();
