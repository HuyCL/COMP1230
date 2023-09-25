<?php
include_once 'User.php';
class Student extends User{
    protected $program;
    protected $semester;
    Protected $gpa;
    protected $num_of_courses;

    public function __construct($fn, $ln, $password, $location, $program, 
                                $semes, $num_of_courses, $passwd_hint)
    {
        parent::__construct($fn, $ln, $password, $location, $passwd_hint);
        $this->program = $program;
        $this->semester = $semes;
        $this->num_of_courses = $num_of_courses;
        $this->type = 1;
    }

    public function recover_passwd($hint){
        if($this->passwd_hint === $hint){
            return "Password is: " . $this->get_passwd() . "<br>";
        }
        else{
            return "Invalid password hint!<br>";
        }
    }
    public function dsp_comment(){ // this was an abstract method
        return "Special comment about this Student: ". $this->comment;
    }

    public function __destruct(){
      //  echo "<br>object of type " . __CLASS__ . " is destroyed!<br>";
    }
}

// 1. Create 2 objects of type Students
// 2. set a brief comment for each object
// 3. using getter methods of the objects, display each 
// student object's full name and comment in separate lines.
// Display the value of $number_of_users property in a new line.


//echo "<hr>";
//show_source(__file__);