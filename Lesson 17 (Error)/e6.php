<?php
$person = [
    'name' => 'XYZ',
    'id' => 2,
    'age' => '19',
    'sex' => 'M',
];

function proccessMaternityLeave($person)
{
    if (18 > $person['age']) {
        throw new Exception("Too Young");
    } elseif ('F' == $person['sex']) {
        echo "Processed";
    } else {
        throw new GenderMismatchException($person);
    }
}


class GenderMismatchException extends Exception
{
    private $person;
    function __construct($person)
    {
        $this->person = $person;
        parent::__construct("Gender Mismatch\n");
    }
    function getDetailedMessage()
    {
        echo "Gender Mismatch for person with ID {$this->person['id']}\n";
    }
}

try {
    proccessMaternityLeave($person);
} catch (GenderMismatchException $e) {
    echo $e->getMessage();
    echo $e->getDetailedMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
