<?php
define('DB_NAME', 'c:\\xampp\\htdocs\\Hasin PHP\\Lesson 8 (CRUD)\\data\\db.txt');
function seed(){
    $data = array(
        array(
            'id' => '1',
            'fname' => 'ifte',
            'lname' => 'hosain',
            'roll' => '5',
        ),
        array(
            'id' => '2',
            'fname' => 'reaid',
            'lname' => 'hosain',
            'roll' => '6',
        ),
        array(
            'id' => '3',
            'fname' => 'md',
            'lname' => 'faisal',
            'roll' => '7',
        ),
        array(
            'id' => '4',
            'fname' => 'tanvir',
            'lname' => 'ahmed',
            'roll' => '8',
        ),
        array(
            'id' => '5',
            'fname' => 'saimon',
            'lname' => 'hasan',
            'roll' => '9',
        ),
        array(
            'id' => '6',
            'fname' => 'mohammad',
            'lname' => 'arafat',
            'roll' => '10',
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
                <td><?php printf('<a href="index.php?task=edit&id=%1$s">Edit</a> | <a class="delete" href="index.php?task=delete&id=%1$s">Delete</a>', $student['id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
}

function addStudent($fname, $lname, $roll){
    $found = false;
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    $id = getNewId($students);
    foreach ($students as $_stutdent) {
        if($_stutdent['roll'] == $roll){
            $found = true;
            break;
        }
    }
    if(!$found){
        $student = array(
            'id' => $id,
            'fname' => $fname,
            'lname' => $lname,
            'roll' => $roll,
        );
        array_push($students, $student);
        $serializeData = serialize($students);
        file_put_contents(DB_NAME, $serializeData, LOCK_EX);
        return true;
    }return false;
}

function getNewId($students){
    $maxId = max(array_column($students, 'id'));
    return $maxId+1;
}
function getStudent($id){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            return $student;
        }
    }return false;
}

function updateStudent($id, $fname, $lname, $roll){
    $found = false;
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    foreach ($students as $_stutdent) {
        if ($_stutdent['roll'] == $roll && $_stutdent['id'] != $id) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        // modify data with individual offset
        $students[$id-1]['fname'] = $fname;
        $students[$id-1]['lname'] = $lname;
        $students[$id-1]['roll'] = $roll;

        $serializeData = serialize($students);
        file_put_contents(DB_NAME, $serializeData, LOCK_EX);
        return true;
    }
    return false;
}

function deleteStudent($id){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    // raw php easy way
    // unset($students[$id - 1]);
    foreach ($students as $offset=>$_stutdent) {
        if ($_stutdent['id'] == $id) {
            unset($students[$offset]);
        }
    }

    $serializeData = serialize($students);
    file_put_contents(DB_NAME, $serializeData, LOCK_EX);
}

function printRaw(){
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    return print_r($students);
}