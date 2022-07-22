<?php
// Wrong way to write code
class Student{
    function checkAttendance(){}
    function calculateGrade(){}
    function collectFee(){}
}

//right way to write code (single responsibility principle)
// Separate classes for each specific task

class GradeCalculate{}

class Attendance{}

class StudentPayments{}