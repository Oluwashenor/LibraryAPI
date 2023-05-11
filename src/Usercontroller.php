<?php
class UserController {
    public function processRequest(string $method, ?string $id) {
        if($method == "GET") { 
          if (isset($id)) {
            $this->getUser($id);
          }  
          else{
              $this->getUsers();
          }
        }
        elseif($method == "POST") {
          $this->createUsers();
        }
        elseif($method == "POST") {
          $this->deleteUser($id);
        }
        else{ 
          echo "Invalid Method";
        }
      }
      

    public function getUsers() 
    {require_once "./Database.php";
        $sql = "SELECT * from users";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
    }

    private function getUser(string $id) {
        require_once "./Database.php";
          $sql = "SELECT * from books where id='$id'";
          $result = $conn->query($sql);
          $rows = array();
          while ($r = mysqli_fetch_assoc($result)) {
              $rows[] = $r;
          }
          echo json_encode($rows);
      }
  
      private function createUsers() {
        require_once "./Database.php";
        print_r($_POST);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $sql = "INSERT INTO Users(fname, lname, email, gender)
  VALUES ('$fname', '$lname', '$email', '$gender')";
  $result = $conn->query($sql);
  if ($result=== TRUE) {
    echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
      }

      private function deleteUser(string $id) {
        require_once "./Database.php";
          $sql = "SELECT * from books where id='$id'";
          $result = $conn->query($sql);
          $rows = array();
          while ($r = mysqli_fetch_assoc($result)) {
              $rows[] = $r;
          }
          echo json_encode($rows);
      }
  }