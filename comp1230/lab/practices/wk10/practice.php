<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// 1. Create 2 objects of type Instructors
$inst1 = new Instructor('Karen', 'Liao', 'abc123', 'Toronto', 'Management', 40, 'abc');
$inst2 = new Instructor('Mark', 'Zuck', 'kcs209c*', 'Toronto', 'Management', 60, 'kcs');
// 2. using getter methods of the objects, display each 
// instructor object's full name, type and creation time on separate lines.
echo "Instructor 1";
echo "<br>" . $inst1->get_name();
echo "<br>" . $inst1->__toString();
echo $inst1->get_creation_date();

echo "<br>Instructor 2";
echo "<br>" . $inst2->get_name();
echo "<br>" . $inst2->__toString();
echo $inst2->get_creation_date();
// 3. Create 2 objects of type Students
$stu1 = new Student('Henry', 'Marco', '*desiq82a', 'Mississauga', 'Computer Programming', 4, 6, '*de');
$stu2 = new Student('Kyle', 'Rein', 'po2m(8s', 'Etobicoke', 'Electrical Technician', 2, 7, 'po2');
// 4. set a brief comment for each object
$stu1->set_comment('Student #1');
$stu2->set_comment('Student #2');
// 5. using getter methods of the objects, display each 
// student object's full name and comment in separate lines.
// Display the value of $number_of_users property in a new line.
echo "<br>" . $stu1->get_name() . "<br>" . $stu1->dsp_comment();
echo "<br>";
echo "<br>" . $stu2->get_name() . "<br>" . $stu2->dsp_comment();
echo "<br><br>Number of Users: " . User::$number_of_users;
echo "<hr>";
show_source(__file__);

