<?php
        // Function 1 - Retrieve parameter value
        // @param               $param_name     name of HTTP request parameter
        // @param(optional)     $default        default value to replace non-existing parameters       
        function get($param_name, $default = "Default") {
            $param_value;
            // Determine the type of method
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST[$param_name])) {
                    $param_value = filter_input(INPUT_POST, $param_name, FILTER_SANITIZE_STRING);
                }
                else {
                    $param_value = $default;
                }
            }
            else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if(isset($_GET[$param_name])) {
                    $param_value = filter_input(INPUT_GET, $param_name, FILTER_SANITIZE_STRING);
                }
                else {
                    $param_value = $default;
                }
            }
            return $param_value;
        }

        // Function 2 - Display HTTP request information
        function display_request_data() {
            // Retrieve HTTP request information from $_SERVER array
            // Organize information in tabular format
            $output = "<table style=\"width:100%\">";
            $output .= "<tr><td>Requested Method</td><td>" . $_SERVER['REQUEST_METHOD'] . "</td></tr>";
            $output .= "<tr><td>Access Time</td><td>" . date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . "</td></tr>";
            $output .= "<tr><td>Referred URL</td><td>" . $_SERVER['REQUEST_URI'] . "</td></tr>";
            $output .= "<tr><td>Client IP Address</td><td>" . $_SERVER['SERVER_ADDR'] . "</td></tr>";
            $output .= "<tr><td>User Agent</td><td>" . $_SERVER['HTTP_USER_AGENT'] . "</td></tr></table>";
            return $output;
        }

        // Function 3 - Create dropdown menu
        // @param               $menu_name          name of the dropdown menu
        // @param               $option_list        dropdown menu options
        // @param(optional)     $selected           select an option value
        function _menu($menu_name, $option_list, $selected = "") {
            $output = "<select name=\"$menu_name\">";
            foreach($option_list as $option) {
                $output .= "<option value=\"$option\" ";
                if($option == $selected) {
                    $output .= "selected"; 
                }
                $output .= ">" . ucfirst($option) . "</option>";
            }
            $output .= "</select>";
            return $output;
        }

        // Function 4 - Get the name of all existing categories
        function get_categories() {
            // Get access to $inventory array in data.inc.php
            include 'data.inc.php';
            $categories = [];
            foreach($inventory as $key => $value) {
                array_push($categories, $key);
            }
            return $categories;
        }

        // Function 5 - Retrieve books by category
        function get_book_by_category($cat_name) {
            // Get access to $inventory array in data.inc.php
            include 'data.inc.php';
            // Contains all books that is under specified category
            $books = [];
            foreach($inventory as $category_name => $bookList) {
                if($category_name == $cat_name) {
                    foreach($bookList as $book) {
                        array_push($books, $book);
                    }
                    break;
                }
            }
            return $books;
        }

        // Function 6 - Retrieve a book by category name and book ID
        // @param               $cat_name           category name
        // @param               $book_id            book unique id
        function search_book($cat_name, $book_id) {
            // Retrieve all categories
            $categories = get_categories();
            // Contains all books that is under a specific category
            $bookList = [];
            $flag = false;
            foreach($categories as $category) {
                // If category is found, retrieve all books under the category
                if($category == $cat_name) {
                    $bookList = get_book_by_category($cat_name);
                    $flag = true;
                    break;
                }
            }
            // Continue book search if the specify category exists
            if($flag) {
                foreach($bookList as $book) {
                    if($book['id'] == $book_id) {
                        return $book;
                    }
                    else {
                        $flag = false;
                    }
                }
                if(!$flag) {
                    return "Cannot find the book";
                }
            }
            else {
                return "Cannot find the category $cat_name";
            }
        }

        // Function 7 - Display book information
        // @param               $book                   array containing a book information
        function print_book($book) {
            // Organize book information in tabular format
            $output = "<table>";
            foreach($book as $key => $value) {
                if($key == "price_type") {
                    foreach($value as $type => $price) {
                        $output .= "<tr><td colspan=\"2\">$type ";
                        if(!empty($price)) {
                            if(!empty($price['s_price'])) {
                                $output .= "$<span id=\"price\">" . $price['o_price'] . "</span> $" . $price['s_price'];
                            }
                            else {
                                $output .= "$" . $price['o_price'];
                            }
                        }
                        $output .= "</td></tr>";
                        
                    }
                }
                else {
                    $output .= "<tr><td>$key</td><td>$value</td></tr>";
                }
            }
            $output .= "</table>";
            return $output;
        }
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Assignment 2</title>
    <meta name="description" content="Assignment 2">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        td {
            padding: 2.5px 20px 2.5px 5px;
        }
        #price {
            text-decoration: line-through;
            color: red;
        }
        table, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <!-- Invoke function 2 -->
    <?php echo display_request_data(); ?><br>
    <!-- Invoke function 4 -->
    <?php $categories = get_categories(); ?>
    <!-- Invoke function 3 -->
    <?php echo _menu('category', $categories); ?><br><br>
    <form method='POST'>
        <input type='text' name='id'>
        <input type="submit">
    </form>
    <!-- Invoke function 5 -->
    <?php 
        echo "<pre>";
        print_r(get_book_by_category('Fiction')); 
        echo "</pre>"; 
    ?>
    <!-- Invoke function 6 -->
    <?php $book = search_book('Fiction', 1); ?>
        
    <!-- Invoke function 7 -->
    <?php
        if(gettype($book) == "array") {
            echo print_book($book);
        }
        else {
            echo $book;
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