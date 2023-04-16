<?php

class BooksController
{
    public function processRequest(string $method, ?string $id): void
    {
        var_dump($method, $id);
    }
};
