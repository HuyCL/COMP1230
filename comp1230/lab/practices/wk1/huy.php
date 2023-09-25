<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Week 1 Lab</title>
    <meta name="description" content="Template">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Huy Lam - 101069146</h1>
    <form method='POST'>
        <label for="subject">Subject:</label><br>
        <input type="text" name="subject"><br>
        <label for="color">Color:</label><br>
        <select name="color">
            <option value="" selected disabled hidden>Select</option>
            <option value="lightgreen">Light green</option>
            <option value="lightblue">Light blue</option>
            <option value="lightpink">Light pink</option>
            <option value="lightcoral">Light Coral</option>
        </select><br>
        <label for="comment">Comment:</label><br>
        <textarea name="comment" rows="5" cols="50"></textarea><br>
        <input type="submit" value="Submit"><hr>
    </form>
    <?php
        $output_str = '';
        if(isset($_POST['subject'], $_POST['comment'], $_POST['color'])) {
            $user_subject = $_POST['subject'];
            $user_comment = $_POST['comment'];
            $user_color = $_POST['color'];
            $output_str = "<section style=\"background-color:$user_color;\"><h2>$user_subject</h2><h3>$user_comment</h3></section>";
        }
        echo $output_str;
    ?>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>