<?php
class BookController
{
  public function processRequest(string $method, ?string $id)
  {
    if ($method == "GET") {
      if (isset($id)) {
        $this->getBook($id);
      } else {
        $this->getBooks();
      }
    } elseif ($method == "POST") {
      if (isset($id)) {
        $this->updateBook($id);
      } else {
        $this->createBooks();
      }
    } elseif ($method == "DELETE") {
      $this->deleteBook($id);
    } else {
      echo "Invalid Method";
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

  private function getBook(string $id)
  {
    require_once "./Database.php";
    $sql = "SELECT * from books where id='$id'";
    $result = $conn->query($sql);
    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
      $rows[] = $r;
    }
    echo json_encode($rows);
  }

  private function createBooks()
  {
    require_once "./Database.php";
    print_r($_POST);
    $name = $_POST['name'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $sql = "INSERT INTO books(name, author, isbn)
            VALUES ('$name', '$author', '$isbn')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  private function deleteBook(string $id)
  {
    require_once "./Database.php";
    $sql = "DELETE FROM books WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result === TRUE) {
      echo "The record was deleted successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  private function updateBook(string $id)
  {
    require_once "./Database.php";
    $name = $_POST['name'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    try {
      $sql = "UPDATE books SET name = '$name', author = '$author',isbn = '$isbn' WHERE id=$id";
      $result = $conn->query($sql);
      if ($result === TRUE) {
        echo "The record was updated successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } catch (mysqli_sql_exception $e) {
      var_dump($e);
    }
  }
}
