<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Some CSS to make the Webpage prettier --> 
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="index">
    <div id="wrapper">
      <div class="hero">
        <div class="row">
          <div class="large-12 columns">
            <h1> Lab 12 - Introspection & Reflection, Magic functions, Class Access Modifiers, Abstract Classes, Interfaces </h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">

          <?php           
              // Part 1 - Final keyword and Abstract Classes
              echo "<br>Part 1 - Final keyword and Abstract Classes<br><hr>";

              // Final class
              final class UnExtendable {
                public $cant_inherit_this;
              }

              // Try to extend a final class
              // class finalExtender extends UnExtendable{
              // }

              // --------- Abstract class; Vehicle
              abstract class Vehicle {
                // Example of a protected field in abstract class
                protected $name;

                // Example of abstract, protected method in abstract class
                abstract protected function drive();

                // Example of a non-abstract method in abstract class
                public function get_name() {
                  return $this->name;
                }
                // Example of a final, non-abstract method in abstract class
                final public function set_name($name_to_set) {
                  $this->name = $name_to_set;
                }
              }
              // --------- Concrete class: Car  
              class Car extends Vehicle implements Electric {
                public $id;
                public $num_wheels = 4;
                // Example of Concrete Class implementing its parent's abstract method 
                public function drive() {
                  $this->turnOn();
                  echo "The car: " . $this->get_name() . " is now being driven <br>";
                }
                // Example of Concrete Class imeplemeting a private method that was not in its abstract parent  
                private function turnOn() {
                  echo "The car: " . $this->get_name() . " is now turned on <br>";
                }
                // Try overriding the final class set_name($name_to_set) from the parent
                // IT WILL GIVE YOU AN EXCEPTION SO COMMENT THE CODE FOR SUBMISSION after looking at the error on your personal page. 
                // public function set_name($name_to_set){
                //   echo "Inside the set_name function";
                // }
                
                // (Come back in Part 4) Example of concrete class implementing its interface's only method. 
                public function run_battery() {
                  echo "The car battery is now running at 12 " . Electric::UNITS . "<br>";
                }
              }
              // Create a Car object and drive it
              $car1 = new Car();
              $car1->set_name("Ford");
              $car1->drive();

              // Try to create a Vehicle object
              // IT WILL GIVE YOU AN EXCEPTION SO COMMENT THE CODE FOR SUBMISSION after looking at the error on your personal page. 
              // $vehicle1 = new Vehicle();





              // Part 2 - Introspection & Reflection
              echo "<br>Part 2 - Introspection & Reflection<br><hr>";

              echo "<br>a) Even though it is abstract, does the abstract class Vehicle exist?: "; 
              echo (class_exists("Vehicle") ? "Yes" : "No");

              echo "<br>b) What is the class of car1?: ";
              echo get_class($car1);

              echo "<br>d) Is car1 of type Vehicle?: ";
              echo (is_a($car1, "Vehicle") ? "Yes" : "No");

              echo "<br>e) Does car1 have the property `name` even though it is protected, and belongs to its parent class Vehicle?: ";
              echo (property_exists($car1, "name") ? "Yes" : "No");

              echo "<br>f) Can you call a turnOn directly from the object car1?: ";
              $reflection = new ReflectionMethod($car1, "turnOn");
              if($reflection->isPublic()) {
                $car1->turnOn();
              } else {
                echo "Cannot turn on car directly because it is a private method, must call drive() instead";
              }

              // Part 3 - Magic Functions
              echo "<br><br>Part 3 - Magic Functions<br><hr>";       

              // --------- Abstract class: Appliance
              abstract class Appliance {
                // Example of a public field in abstract class
                public $model;
                protected $used_for;

                // Example of a contructor in an abstract parent class
                function __construct() {
                  $this->used_for = "The household";
                  echo "In Parent class constructor. These appliances are used for: " . $this->used_for . "<br";
                }

                // Example of destructor in parent class 
                function __destruct() {
                  echo "The part of the object that was made from the parent class is about to be destroyed <br>";
                }

                // Example of abstract, protected method in abstract class
                abstract protected function doHouseWork();

              }
              // --------- Concrete Class: Fan                     
              class Fan extends Appliance implements Electric {
                public $id;
                public $instances = 0;

                // Example of Concrete Class implementing its parent's abstract method 
                public function doHouseWork() {
                  echo "The fan: " . $this->model . " is currently working <br>";
                }

                // Example of  magic method constructor in child class
                function __construct() {
                  parent::__construct();
                  echo "<br>In Subclass constructor<br>";
                }

                // Example of magic method destructor in child class 
                function __destruct() {
                  echo "The object" . $this->model . " and all of its data is about to be destroyed <br>";
                  parent::__destruct();
                }

                // Example of magic method __call
                function __call($method_name, $args_passed) {
                  echo "The method " . $method_name . " does not exist for the class Fan. <br>";
                }

                // Example of magic method __clone
                function __clone() {
                  echo "Currently cloning<br>";
                }

                // (Come back in Part 4) Example of concrete class implementing its interface's only method. 
                public function run_battery() {
                  echo "The fan battery is now running at 200 " . Electric::UNITS . "<br>";
                }

              }
              // Create a Fan object and do house work with it
              $fan1 = new Fan();
              $fan1->model = "Dyson";
              $fan1->doHouseWork();

              // Try to call the method get_name() from fan1
              $fan1->get_name();

              // Clone the fan to make a deep copy
              $fan2 = clone $fan1;

              echo "Are fan1 and fan2 the same object? ";
              echo ($fan1 === $fan2) ? "Yes" : "No";

              echo "<br>Do fan1 and fan2 have the same values? ";
              echo ($fan1 == $fan2) ? "Yes" : "No";



              // Part 4 - Interfaces
              echo "<br><br>Part 4 - Interfaces <br><hr>";

              // --------- Interface: Electric
              Interface Electric {
                // Example of a Constant field in an Interface
                const UNITS = "volts";

                // Example of a public Interface method. Classes that implement this class need to implement 
                public function run_battery();

              }
              // Run battery on both the car and the fan  
              $car1->run_battery();
              $fan1->run_battery();


              // Part 5 - Automatic destruction of objects
              echo "<br>Part 5 - Automatic destruction of objects <br><hr>";
              
          ?>
        
              
        </div>
      </div>
    </div>
  </body>
</html>
