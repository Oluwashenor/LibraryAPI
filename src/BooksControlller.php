<?php



class BooksController
{
    public function processRequest(string $method, ?string $id): void
    {
        var_dump($method, $id);
        if ($id != null) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processResourceCollection($method);
        }
    }

    private function processResourceRequest(string $method, string $id)
    {
    }

    private function processResourceCollection(string $method)
    {
        switch ($method) {
            case 'GET': {
                    $this->getbooks();
                    break;
                }
            default:
                # code...
                break;
        }
    }

    private function getbooks()
    {
        require_once "./Database.php";
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
};
