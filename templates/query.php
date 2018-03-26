<?php 
    require_once('navbar.php');
    if(@$_GET["search_text"]){
        $r_movies = $functions->query_movies(@$_GET["query"]);
        $r_actors = $functions->query_actors(@$_GET["query"]);
        $r_directors = $functions->query_directors(@$_GET["query"]);
    }
    else {
        $r_actors = NULL;
        $r_directors = NULL;
        $r_movies = NULL;
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=s, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Actors</title>
        <style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
      <style>
        .navbar {
            height: 60px;
            background: rgba(0, 0, 0, .4) !important;
        }
        .body-card {
            padding: 5px;
            display: grid;
            grid-template-rows: 10% 50% 30% 10%;
        }
        .card {
            display: grid;
            grid-template-columns: 30% 70%;
        }
    .navbar-brand {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 5px;
        text-align: center;
        margin: auto;
        font-size: 25px;
    }
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
    }
    body {
        background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
    }
    
    </style>
    </head>
    <body>
        <div class="content">
            <div class="content-inner">
                <?php if($r_movies) { ?>
                    <?php while($data = $r_movies->fetch_assoc()) { ?>
                        <div class="card my-3" style="width: 52.5rem;">
                       <img class="card-img-top" src="<?php echo $data["cover_link"] ?>" alt="Card image cap">
                        <div class="body-card">
                            <h5 class="card-title"><?php echo $data["movie_name"] ?></h5>
                            <p class="card-text" style="text-align:justify;";><?php echo $data["synopsis"] ?></p>
                            <p>
                                Rating:&nbsp;&nbsp;<?php echo $data["rating"]; ?><br>
                                Duration:&nbsp;&nbsp;<?php echo $data["duration"]; ?><br>
                                Gross:&nbsp;&nbsp;<?php echo $data["gross"]; ?><br>
                                Contributor:&nbsp;&nbsp;<?php echo $data["contributor"]; ?>                              
                            </p>
                            <div class="text-right">
                                <a href="crew.php?mid=<?php echo $data["mid"]?>" class="btn btn-success subRe">Movie Crew</a>
                                <a href="<?php echo $data["torrent_link"] ?>" class="btn btn-primary">Download Torrent</a>
                                <a href="#" class="btn btn-success" disabled>Rating - <?php echo $data["rating"] ?></a>
                                <a href="#" class="btn btn-warning" disabled>Year - <?php echo $data["year"] ?></a>
                            </div>
                        </div>
                    </div>
                <?php } } ?>

                <?php if($r_actors) { ?>
                    <?php while($data = $r_actors->fetch_assoc()) { ?>
                        <div class="card my-3" style="width: 52.5rem;">
                        <img class="card-img-top" src="<?php echo $data["img_url"] ?>" alt="Card image cap">
                        <div class="body-card">
                            <h5 class="card-title"><?php echo $data["actor_name"] ?></h5>
                            <p class="card-text" style="text-align:justify;";><?php echo $data["synopsis"] ?></p>
                            <p>
                                Born On:&nbsp;&nbsp;<?php echo $data["birth_date"]; ?><br> 
                                From:&nbsp;&nbsp;<?php echo $data["birth_place"]; ?><br>                             
                            </p>
                        </div>
                    </div>
                <?php } } ?>

                <?php if($r_directors) { ?>
                    <?php while($data = $r_directors->fetch_assoc()) { ?>
                        <div class="card my-3" style="width: 52.5rem;">
                        <img class="card-img-top" src="<?php echo $data["img_url"] ?>" alt="Card image cap">
                        <div class="body-card">
                            <h5 class="card-title"><?php echo $data["dir_name"] ?></h5>
                            <p class="card-text" style="text-align:justify;";><?php echo $data["synopsis"] ?></p>
                            <p>
                                Born On:&nbsp;&nbsp;<?php echo $data["birth_date"]; ?><br> 
                                From:&nbsp;&nbsp;<?php echo $data["birth_place"]; ?><br>                             
                            </p>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </body>
</html>