<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers: Rutas

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->get('/nuevaruta/{nombre}', function($nombre) use($app) {
  $app['monolog']->addDebug('logging output.');

  if(is_string($nombre)){
  $entero= intval($nombre);
  return "Hola bienvenido a una nueva ruta. Tú nombre es: " . $nombre . " y su entero es: " . $entero;
}
else{
	return "por favor escribe una ruta con la forma nuevaruta/tunombre";
}
});

$app->post('/post', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->run();
