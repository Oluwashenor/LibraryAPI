<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "src/BookController.php";
require_once "src/AuthorController.php";
require_once "src/UserController.php";

header("Content-type: application/json");
//echo(json_encode('Welcome to my library API'));

$requesturl = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];
$requesturlparts = explode("/", $requesturl);
$id = $requesturlparts[3] ?? null;


$requestmethod = $_SERVER["REQUEST_METHOD"];
//print_r($requesturl);
// echo "\n";
// print_r($requesturlparts);
// exit;

if ($requesturlparts[1] != "LibraryAPI") {
    http_response_code(404);
    exit;
}
if ($requesturlparts[2] == "books") {
    //echo(json_encode("You are requesting for books."));
    $booksController = new BookController();

    $booksController->processRequest($requestMethod, $id);
    //exit;
} elseif ($requesturlparts[2] == "authors") {
    //echo(json_encode("You are searching for an anthor."));
    $authorController = new AuthorController();
    $authorController->processRequest($requestMethod, $id);
    //exit;
} elseif ($requesturlparts[2] == "users") {
    //echo(json_encode("You are searching for a user."));
    $userController = new UserController();
    $userController->processRequest($requestMethod, $id);
    //exit;
} else {
    http_response_code(404);
    exit;
}
