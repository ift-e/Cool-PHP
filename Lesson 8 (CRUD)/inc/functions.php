<?php
define('DB_NAME', 'c:\\xampp\\htdocs\\Hasin PHP\\Lesson 8 (CRUD)\\data\\db.txt');
function seed(){
    $data = array(
        array(
            'id' => '1',
            'fname' => 'ifte',
            'lname' => 'hosain',
            'roll' => '10',
        ),
        array(
            'id' => '2',
            'fname' => 'reaid',
            'lname' => 'hosain',
            'roll' => '9',
        ),
        array(
            'id' => '3',
            'fname' => 'md',
            'lname' => 'faisal',
            'roll' => '11',
        ),
        array(
            'id' => '4',
            'fname' => 'tanvir',
            'lname' => 'ahmed',
            'roll' => '13',
        ),
        array(
            'id' => '5',
            'fname' => 'saimon',
            'lname' => 'hasan',
            'roll' => '20',
        ),
        array(
            'id' => '6',
            'fname' => 'mohammad',
            'lname' => 'arafat',
            'roll' => '15',
        ),
    );
    $serializeData = serialize($data);
    file_put_contents(DB_NAME, $serializeData, LOCK_EX);
}

function generateReport(){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <th width="25%">Action</th>
        </tr>
        <?php
            foreach ($students as $student) : ?>
            <tr>
                <td><?php printf('%s %s', $student['fname'], $student['lname']); ?></td>
                <td><?php printf('%s', $student['roll']); ?></td>
                <td><?php printf('<a href="index.php?task=edit&id=%1$s">Edit</a> | <a href="task=delete&id=%1$s">Delete</a>', $student['id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
}