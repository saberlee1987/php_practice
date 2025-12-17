<?php
var_dump("json 1 practice");

class Person
{
    private string $firstname;
    private string $lastname;
    private string $email;

    public function __set(string $name, $value): void
    {
        $this->$name = $value;
    }

    public function __get(string $name)
    {
        return $this->$name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        $properties = (new ReflectionClass($this))->getProperties();
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $data[$property->getName()] = $property->getValue($this);
        }
        return $data;
    }
}

$json = '
        {
         "firstname" : "saber"
         ,"lastname" : "azizi"
         ,"age" : 38
         ,"email" : "saberazizi66@yahoo.com"
         ,"mobile" : "09365627895"
        }
';
//$person  = json_decode($json,false);
//var_dump($person);
//var_dump($person->firstname);
//var_dump($person->lastname);
$person1 = new Person();
$person1->setFirstname("bruce");
$person1->setLastname("lee");
$person1->setEmail("bruce40@yahoo.com");
var_dump($person1);
var_dump($person1->jsonSerialize());


var_dump(json_encode($person1->jsonSerialize(), JSON_PRETTY_PRINT | JSON_FORCE_OBJECT));
