<?php
require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

Dotenv::createImmutable(dirname(__DIR__))->load();
$dotenv = Dotenv::createImmutable(dirname(__DIR__))->load();
$router = new \Bramus\Router\Router();

$router->setNamespace('\App\Controller');
$router->get('/note/list', 'NoteController@index');
$router->post('/note/save', 'NoteController@save');
$router->delete('/note/remove/{noteId}', 'NoteController@remove');
$router->put('/note/update/{noteId}', 'NoteController@update');

$router->run();
