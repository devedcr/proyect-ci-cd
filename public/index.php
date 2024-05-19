<?php
//require_once '../vendor/autoload.php';
require_once './vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
if(file_exists(".env")) {
    $dotenv->load();
}

$router = new \Bramus\Router\Router();

$router->setNamespace('\App\Controller');
$router->get('/note/list', 'NoteController@index');
$router->post('/note/save', 'NoteController@save');
$router->delete('/note/remove/{noteId}', 'NoteController@remove');
$router->put('/note/update/{noteId}', 'NoteController@update');

$router->run();
