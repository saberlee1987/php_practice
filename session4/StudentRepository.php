<?php

class StudentRepository
{

    function findAllStudents()
    {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=test2'
            , 'saber66', 'AdminSaber66');
        $statement = $pdo->query("select * from students");
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        $students = [];
        foreach ($rows as $row) {
            $student = $this->getStudent($row);
            $students[] = $student;
        }
//        var_dump($students);
        return $students;
    }

    function saveStudent($student)
    {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=test2'
            , 'saber66', 'AdminSaber66');
        $sql = "insert into students (name, email, password, age, address)
values (:name,:email,:password,:age,:address)";
        $PDOStatement = $pdo->prepare($sql);
        return $PDOStatement->execute([
            ":name" => $student->getName(),
            ":email" => $student->getEmail(),
            ":password" => $student->getPassword(),
            ":age" => $student->getAge(),
            ":address" => $student->getAddress()
        ]);
    }

    function findById($id)
    {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=test2'
            , 'saber66', 'AdminSaber66');
        $statement = $pdo->prepare("select * from students where id=:id");
        $statement->execute([
            ":id" => $id
        ]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $student = null;
        if ($row != null) {
            $student = $this->getStudent($row);
        }
        return $student;
    }

    function existById($id)
    {
        $student = $this->findById($id);
        if ($student) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $row
     * @return Student
     */
    public function getStudent($row)
    {
        $student = new Student();
        $student->setId($row["id"]);
        $student->setName($row["name"]);
        $student->setEmail($row["email"]);
        $student->setPassword($row["password"]);
        $student->setAge($row["age"]);
        $student->setAddress($row["address"]);
        $student->setCreatedAt($row["createdAt"]);
        return $student;
    }

    public function deleteById($id)
    {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=test2'
            , 'saber66', 'AdminSaber66');
        $statement = $pdo->prepare("delete from students where id=:id");
        $statement->execute([
            ":id" => $id
        ]);
    }

    public function updateStudent(Student $student)
    {

        $pdo = new PDO('mysql:host=localhost:3306;dbname=test2'
            , 'saber66', 'AdminSaber66');
        $sql = "update students set name=:name , email=:email , password=:password 
        , age=:age,address=:address where id=:id";
        $PDOStatement = $pdo->prepare($sql);
        return $PDOStatement->execute([
            ":name" => $student->getName(),
            ":email" => $student->getEmail(),
            ":password" => $student->getPassword(),
            ":age" => $student->getAge(),
            ":address" => $student->getAddress(),
            ":id" => $student->getId()

        ]);
    }
}