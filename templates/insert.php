<?php 
    require_once('../functions/functions.php');

    $movie_name = $_POST['movie_name'];
    $synopsis = $_POST['synopsis'];
    $rating = $_POST['rating'];
    $year = $_POST['year'];
    $gross = $_POST['gross'];
    $duration = $_POST['duration'];
    $cover_link = $_POST['cover_link'];
    $torrent_link = $_POST['torrent_link'];
    $check = $functions->insert_movie();
?>