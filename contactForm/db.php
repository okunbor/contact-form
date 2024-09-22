<?php
// database connection class


class DB extends Exception
{


    private $host;
    private $user;
    private $password;
    private $database;

    public $conn;


    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "form";
    }


    public function conn()
    {
        // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->conn = new mysqli($this->host,  $this->user,  $this->password,  $this->database);

        if ($this->conn->connect_errno) {

            $this->error($this->conn->connect_errno);
        }
    }


    public function prepareInsert(string $firstname, string $lastname, int $age, string $email)
    {


        try {
            $stmt = $this->conn->prepare("INSERT INTO contact(firstname, lastname, age, email) VALUES (?, ?, ?, ?)");

            $stmt->bind_param("ssis", $firstname, $lastname, $age, $email); // "is" means that $id is bound as an integer and $label as a string

            $stmt->execute();

            print("insert  successfull");
        } catch (\Exception  $th) {

            printf("error code : %d", $th->getCode());

            print("<br>");

            printf("error message : %s\n", $th->getMessage());
            
            print("<br>");

            printf("error on line : %d\n", $th->getLine());
            
            print("<br>");

            printf(" error in file : %s", $th->getFile());
        }
    }



    public function error($err)
    {

        print('Connection error: ' . $err);
        die;
    }


    public function close()
    {

        $this->conn->close();
    }
}
