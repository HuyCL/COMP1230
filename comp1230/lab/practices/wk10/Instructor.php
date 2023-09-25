<?php
include_once 'User.php';
class Instructor extends User{
    protected $department;
    Protected $num_of_hours;
public function __construct($fn, $ln, $password, $location, $dept,
                                $num_of_hrs, $passwd_hint)
    {
        parent::__construct($fn, $ln, $password, $location, $passwd_hint);
        $this->department = $dept;
        $this->num_of_hours = $num_of_hrs;
        $this->type = 2;
    }

    // extra security check can be performed to recover instructor's password
    public function recover_passwd($hint){
        if($this->passwd_hint === $hint){
            return "Password is: " . $this->get_passwd() . "<br>";
        }
        else{
            return "Invalid password hint!<br>";
        }
    }
    public function dsp_comment(){ // // this was an abstract method
        return "Special comment about this Instructor: ". $this->comment;
    }

    public function __destruct(){
     //   echo "<br>object of type " . __CLASS__ . " is destroyed!<br>";
    }
}

// 1. Create 2 objects of type Instructors
// 2. set a brief comment for each object
// 3. using getter methods of the objects, display each 
// instructor object's full name, type and creation time on separate lines.

//echo "<hr>";
//show_source(__file__);