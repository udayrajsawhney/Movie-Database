<?php 
    require_once('../functions/functions.php');
    if(@$_POST["movie_name"]){

        $movie_name = @$_POST['movie_name'];
        $synopsis = @$_POST['synopsis'];
        $rating = $_POST['rating'];
        $year = $_POST['year'];
        $gross = $_POST['gross'];
        $duration = $_POST['duration'];
        $cover_link = $_POST['cover_link'];
        $torrent_link = $_POST['torrent_link'];
        $contributor = $_POST['contributor'];

        $ins = $functions->insert_movie($_POST['movie_name'], $_POST['synopsis'],
                                            $_POST['rating'], $_POST['year'], $_POST['gross'],
                                                $_POST['duration'], $_POST['cover_link'],$_POST['torrent_link'],$_POST['contributor']);
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Movies</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            width: 100vw;
            height: 100vh;
        }
        .inner{
            width: 100%;
            height: 100%;
            opacity: .6;
            background-image: url('collage.jpg');
            position: fixed;
            top:0;
            z-index: -10;
        }
        .inner-inner {
            position: relative;
            top: 0;
            left: 0;
        }
        .jumbotron {
            position: absolute;
            width: 100%;
        }
        .form {
            width: 60%;
            background: rgba(0, 0, 0, .3);
            padding: 10px;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .6);
        }
        a:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
<nav style="background: linear-gradient(to right, #232526, #414345); text-align: center;">
    <a style="font-size: 40px; color: #fff;" href="/index.php">Movie Base</a>
</nav>
    <div class="inner">
        
    </div>

    <div class="inner-inner my-5">
        <div style="display: flex; justify-content: center;">        
        <div class="form">
        <h1 class="display-4 text-center" style="color: #fff">Movie Details</h1>        
        <form method="post" action="">
            <div class="form-group">
                <label for="exampleFormControlInput1">Movie Name :</label>
                <input required type="text" class="form-control"  name="movie_name" placeholder="Enter movie name.">
            </div>
            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Synopsis :</label>
                    <textarea required class="form-control" name="synopsis" placeholder="Enter brief description of the movie." rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Year of Release :</label>
                    <select required class="form-control" name="year" id="iter">
                        
                    </select>
            </div>   
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Rating :</label>
                    <select required class="form-control" name="rating" id="iter2">
                        
                    </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Gross :</label>
                <input required type="text" class="form-control"  name="gross" placeholder="In American dollars($)">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Duration :</label>
                <input required type="text" class="form-control"  name="duration" placeholder="In minutes">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Cover Link :</label>
                <input required type="text" class="form-control"  name="cover_link" placeholder="Link for movie poster">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Torrent Link :</label>
                <input required type="text" class="form-control"  name="torrent_link" placeholder="Torrent link for movie">
            </div>  
            <div class="form-group">
                <label for="exampleFormControlInput1">Contributor :</label>
                <input type="text" class="form-control"  name="contributor" placeholder="Submitted name will be publicly visible">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success mb-2 " >Submit</button>
            </div> 
        </form>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('#iter').innerHTML = Array.from({ length: 69 }, (_, i) => 2018-i).map(e => `<option>${e}</option>`).join('')
        document.querySelector('#iter2').innerHTML = Array.from({ length: 10 }, (_, i) => 10-i).map(e => `<option>${e}</option>`).join('')  
    </script>
</body>
</html>