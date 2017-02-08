<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/places.php";

    session_start();

    if (empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../view'
    ));

    // home page has input for places
    $app->get("/", function() use ($app) {
        return $app['twig']->render('root.html.twig');
    });

    // display page to show list
    $app->post("/places", function() use ($app) {
        $place = new Place($_POST['location'],$_POST['date']);
        $place->save();
        return $app['twig']->render('places.html.twig', array('places' => Place::getAll()));
    });

    //delete button

    $app->post("/home", function() use ($app) {
        Place::delete();
        return $app['twig']->render('root.html.twig');
    });

    // delete page to clear list of pages
    // $app->get("/delete_places") {
    //
    // }


    return $app;
?>
