<?php
class AuthorController {
    public function processRequest(string $method, ?string $id) {
        if($method == "GET") { 
          if (isset($id)) {
            $this->getAuthor($id);
          }  
          else{
              $this->getAuthors();
          }
        }
        elseif($method == "POST") {
          $this->createAuthors();
        }
        elseif($method == "POST") {
          $this->deleteAuthor($id);
        }
        else{ 
          echo "Invalid Method";
        }
      }
    
    private function getAuthors() 
    {require_once "./Database.php";
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);

    }
    private function getAuthor(string $id) {
        require_once "./Database.php";
          $sql = "SELECT * from books where id='$id'";
          $result = $conn->query($sql);
          $rows = array();
          while ($r = mysqli_fetch_assoc($result)) {
              $rows[] = $r;
          }
          echo json_encode($rows);
  
      }
  
      private function createAuthors() {
        require_once "./Database.php";
        print_r($_POST);
        $author_fname = $_POST['author_fname'];
        $author_lname = $_POST['author_lname'];
        $sql = "INSERT INTO Authors(author_fname, author_lname)
  VALUES ('$author_fname', '$author_lname')";
  $result = $conn->query($sql);
  if ($result=== TRUE) {
    echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
      }

      private function deleteAuthor(string $id) {
        require_once "./Database.php";
          $sql = "DELETE FROM books WHERE id='$id'";
          $result = $conn->query($sql);
          $rows = array();
          while ($r = mysqli_fetch_assoc($result)) {
              $rows[] = $r;
          }
          echo json_encode($rows);
  
      }    
  }