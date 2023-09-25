<?php
/*

This class will be used as base class for Student, Instructor,
Staff, Manager classes to create users of such type

 */

class User{
    protected $f_name, $l_name;
    protected $comment;
    protected $type; // type of account 1=student, 2=instructor
    protected $passwd_hint;
    private $id;
    private $passwd;
    private $creation_time;
    public $location;


    // static and constant attribute are shared by every object.
    public static $number_of_users = 0;
    const COLLEGE = "George Brown";

    // A Constructor is used to initialize objects when they are instantiated
    function __construct($fn, $ln, $password, $location, $passwd_hint){

        $this->f_name = $fn;
        $this->l_name = $ln;
        $this->passwd = $password;
        $this->location = $location;
        $this->passwd_hint = $passwd_hint;
        $this->id = rand(1000000, 1019999);

        // You access static attributes using self or class name followed by ::$static_att 
        // User::$number_of_users++; 
        self::$number_of_users++;
        date_default_timezone_set('America/Toronto');
        $this->creation_time = date('Y-m-d H:i:s');

    }
    function get_name(){
        return $this->f_name . " " .$this->l_name;
    }

    // A Destructor is called when all references to the object have
    // been unset/end of program. It cannot receive arguments
    public function __destruct(){
      //  echo "<br>object of type " . __CLASS__ . " is destroyed!<br>";
    }

    public function get_id(){
          return $this->id;
    }
    protected function get_passwd(){
        return $this->passwd;
    }
    // abstract public function recover_passwd($hint);

    // we can use magic setters and getters to
    // set or get property's value
    /*   function __get($name){
           return $this->$name;
       }
   */
    // If we want to limit certain properties be set directly:
    function __set($name, $value){

        switch($name){
            case "f_name":
                $this->f_name = $value;
                break;

            case "l_name":
                $this->l_name = $value;
                break;

            case "location":
                $this->location = $value;
                break;

            default :
                echo $name . "Attribute not found or it cannot be set!";
        }

    }

    function set_comment($value){
        $this->comment = $value;
    }

    function get_creation_date(){
        return "Creation date-time: " . $this->creation_time . "<br>";
    }

    // to define what prints when
    // the object is passed to a print/echo function
    function __toString(){
        return "This is an object of type " . get_class($this). "<br>";

    }
}

