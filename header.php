<?php
echo '
<!doctype html>

<html lang="en"><head>

    <meta charset="utf-8">

    <title>menu demo</title>

    <link rel="stylesheet" href="menu/css/menu.css">
    <link rel="stylesheet" href="../css/jquery-ui-1.10.1.custom.css">
    

    <script src="menu/js/jquery-1.9.1.js"></script>
     <script src="menu/js/jquery-ui-1.10.1.custom.js"></script>


</head>

<body>

 <nav>
<ul id="menu" class="dropdown">

    <li><a href="#">HOME</a></li>


    <li><a href="post.php">POST AND COMMENTS</a>

        <ul>

            <li><a href="post.php">VIDEO</a></li>

            <li><a href="post.php">AUDIO</a></li>
            <li><a href="post.php">TEXT</a></li>
        </ul>

    </li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
</ul>
<br><br>
<br><br>
</body>

</html> ';
?>