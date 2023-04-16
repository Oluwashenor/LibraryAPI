<?php

// var_dump($_SERVER["REQUEST_URI"]);


// spl_autoload_register(function ($class) {
//     require __DIR__ . "/src/$class.php";
// });

require_once "src/BooksControlller.php";

header("Content-type: application/json");

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);
print_r($url_parts);

if ($url_parts[1] != "libraryAPI") {
    http_response_code(404);
    exit;
}
$id = $url_parts[3] ?? null;

$booksController = new BooksController();

$booksController->processRequest($_SERVER["REQUEST_METHOD"], $id);
