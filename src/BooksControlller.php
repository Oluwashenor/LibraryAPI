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
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
    }
};
