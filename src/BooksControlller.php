<?php



class BooksController
{
    public function processRequest(string $method, ?string $id): void
    {
        if ($id != null) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processResourceCollection($method);
        }
    }

    private function processResourceRequest(string $method, string $id)
    {
        switch ($method) {
            case 'GET':
                $this->getBook($id);
                break;

            default:
                # code...
                break;
        }
    }

    private function processResourceCollection(string $method)
    {
        switch ($method) {
            case 'GET': {
                    $this->getBooks();
                    break;
                }
            default:
                # code...
                break;
        }
    }

    private function getBooks()
    {
        require_once "./Database.php";
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
    }

    private function getBook($id)
    {
        require_once "./Database.php";
        $sql = "SELECT * from books where id = '$id'";
        $result = $conn->query($sql);
        $response = mysqli_fetch_assoc($result);
        echo json_encode($response);
    }
};
