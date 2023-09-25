<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>First Page</title>
    <meta name="description" content="COMP1230 - Retrieve data from submitted form and create an output">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
        .strong {
            font-weight: bold;
        }
        .underline {
            text-decoration: underline;
        }
        .uppercase {
            text-transform: uppercase;
        }
    </style>
<body>
    <?php
        $first_name = 'Huy';
        $last_name = 'Lam';
        $student_id = '101069146';
        $courses = array("COMP1230" => "Advanced Web Programming", "COMP2129" => "Advanced Object Oriented Programming", "COMP2138" => "Advanced Database Development",
                         "COMP2147" => "Systems Analysis, Design, and Testing", "COMP2130" => "Application Development Using Java", "GSSC1027" => "Personal Finance");

        echo "<h1>$first_name, $last_name - $student_id</h1>";
    ?>
    <form method="POST">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="Huy"><br><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="Lam"><br><br>
        <label for="student_id">Student ID:</label><br>
        <input type="text" id="student_id" name="student_id" value="101069146"><br><br>
        <label for="course_list">Select a course:</label><br>
        <input list="courses" id="course_list" name="course_list" required><br><br>
        <label for="color">Select a color:</label><br>
        <select name="color" required>
            <option value="" selected disabled hidden>Choose one</option>
            <option value="lightblue">Light Blue</option>
            <option value="lightgreen">Light Green</option>
            <option value="lightpink">Light Pink</option>
            <option value="lightyellow">Light Yellow</option>
            <option value="lightgrey">Light Grey</option>
        </select><br><br>
        <label for="strong">Style:</label>
        <input type="checkbox" id="strong" name="strong" value="strong">
        <label for="strong">Strong</label>
        <input type="checkbox" id="underline" name="underline" value="underline">
        <label for="underline">Underline</label>
        <input type="checkbox" id="uppercase" name="uppercase" value="uppercase">
        <label for="uppercase">Uppercase</label><br><br>
        <label for="font-size">Font Size:</label>
        <input type="radio" id="font-size" name="font_size" value="12pt" checked="checked">
        <label for="font-size">12pt</label>
        <input type="radio" name="font_size" value="18pt">
        <label for="font-size">18pt</label>
        <input type="radio" name="font_size" value="24pt">
        <label for="font-size">24pt</label><br><br>
        <input type="submit" name="Submit">
    </form>
    <?php
        $output = "<datalist id=\"courses\">";
        foreach($courses as $key => $value) {
            $output .= "<option value=\"$key\">$value";
        }
        $output .= "</datalist>";
        echo $output;
    ?>
    <?php
        // Extract, filter, and sanitize data from input fields
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $student_id = filter_input(INPUT_POST, 'student_id', FILTER_SANITIZE_STRING);
        $chosen_course = filter_input(INPUT_POST, 'course_list', FILTER_SANITIZE_STRING);

        // Filter/Sanitize is not necessary for below fields because the values are pre-determined(user cannot change the values)
        $color = $_POST['color'];
        $strong = $_POST['strong'];
        $underline = $_POST['underline'];
        $uppercase = $_POST['uppercase'];
        $font_size = $_POST['font_size'];
        $output = "";

        // Confirm if form submission is successful before attempting to work with form data
        if (isset($_POST['Submit'])) {
            $output .= strtoupper("<h2>$first_name $last_name - $student_id</h2>");
            $output .= "<div class=\"";
            $output .= ($strong != false || $strong != NULL) ? "$strong " : "";
            $output .= ($underline != false || $strong != NULL) ? "$underline " : "";
            $output .= ($strong != false || $strong != NULL) ? "$uppercase" : "";
            $output .= ($font_size != "" || $font_size != NULL) ? "\" style=\"font-size:$font_size" : "";
            $output .= "\">$courses[$chosen_course]</div>";
            $output .= "<br><br><a href=\"huy.php?first_name=$first_name&last_name=$last_name&student_id=$student_id&color=$color\">Next Page</a>";
            echo $output;
        }
    ?>
    <hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>