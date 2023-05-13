<?php
    include_once 'header.php';

?>

<!-- add image to portfolio.php. -->

<style>
    form {
        display: flex;
        flex-direction: column;
        width: 50%;
        margin: 0 auto;
        height: 100vh;
        justify-content: center;
        align-items: center;
    }

    input[type="text"] {
        padding: 0 10px;
        margin-bottom: 10px;
        width: 100%;
        border: 2px solid #ccc;
        height: 30px;
    }
    input[type="text"]:focus {
        outline: none;
        border: 2px solid #0099ff;
        background-color: #beffff;
    }

    input[type="file"] {
        margin-bottom: 10px;
        width: 100%;
    }

    button[type="submit"] {
        width: 50%;
        margin: 0 auto;
        height: 30px;
        background-color: #0099ff;
        color: #fff;
        border-radius: 10px;
    }
</style>

<form action="process.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="description" placeholder="Description">
    <input type="file" name="image" placeholder="Image">
    <button type="submit" name="portfolio-submit">Submit</button>
</form>