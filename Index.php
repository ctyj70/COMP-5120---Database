<!-- LIVE WEBSITE LINK is http://webhome.auburn.edu/~cty0008/ -->
<!DOCTYPE html>
<html>
<head>
    <title>Young's Bookstore</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site_Style.css">
</head>
<style>

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<body>
<div class="testbox">
    <form method="post">

        <!-- Displays the website banner and banner title -->
        <div class="banner">
            <h1>Young's Bookstore</h1>
        </div>

        <!-- Displays website background -->
        <style>
        body {
        background-image: url('https://cdn.wallpapersafari.com/13/14/XdZGlu.gif');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        </style>

        <!-- Displays the title of textbox-->
        <div class="item">
            <label for="Name">Please enter MySQL statement below<span>:</span></label>
            <!-- Displays Textbox entry-->
            <textarea  style="height: 200px" id="inputQuery" type="text" name="inputQuery" required></textarea>
        </div>

<!--Submission button -->
        <div class="btn-block" style="margin-bottom: 45px">
            <button type="submit" name="submitButton">SUBMIT</button>
        </div>

        <!-- Sends User input to bookstoreDBManager.php to find query in Database -->
        <?php
        include 'bookstoreDBManager.php';
        if (isset($_POST['submitButton']))
        {
            queryHandler($_POST['inputQuery']);
        }
        ?>
    </form>
</div>
</body>
</html>