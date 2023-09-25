<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page ?></title>
    <meta name="description" content="MVC concept">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0;
        }
        nav {
            background: lightgray;
            margin-bottom: 10px;
        }
        nav ul{
            list-style-type: none;
            padding: 5px;
        }
        nav ul li{
            display: inline-block;
            padding: 3px;
        }
        nav ul li a{
            text-decoration: none;
            color: darkblue;
        }
        nav ul li a:hover{
            color: blue;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="?page=home">Home</a></li>
            <li><a href="?page=users">Users</a></li>
            <li><a href="?page=issues">Issues</a></li>
        </ul>
    </nav>