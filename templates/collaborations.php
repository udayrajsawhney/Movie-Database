<?php 
    require_once('navbar.php');
    $r = $functions->directors_actors();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=1, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Actors</title>
        <style>
        .navbar {
            height: 60px;
            background: rgba(0, 0, 0, .4) !important;
        }
        .body-card {
            padding: 5px;
        }
        .my-card {
            display: grid;
            grid-template-rows: 320px 130px;
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
    .content-inner {
        margin-top: 30px;
        display: grid;
        grid-template-columns: repeat(2, 14rem);
        grid-gap: 28px;
        grid-row-gap: 150px;
    }
    </style>
    </head>
    <body>
        <div class="content" style="width: 100vw">
            <div class="content-inner">
                <?php
                    while($data = $r->fetch_assoc()) {

                        $a_details = $functions->get_actor_details($data["aid"]);
                        $d_details = $functions->get_dir_details($data["did"]);?>        
                        <div class="my-card" style="width: 100%;">
                                <img style="width: 100%; height: 100%;"  src="<?php echo $a_details["img_url"] ?>" alt="Card image cap">
                                <div style="background: #fff; height: 250px;">
                                    <h4 class="card-title text-center" style="margin-top:10px;"><?php echo $a_details["actor_name"] ?></h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Birth Date: <?php echo $a_details["birth_date"] ?></li>
                                        <li class="list-group-item">Birth Place: <?php echo $a_details["birth_place"] ?></li>
                                    </ul>
                                </div>
                        </div>

                        <div class="my-card" style="width: 100%;">
                                <img style="width: 100%; height: 100%;"  src="<?php echo $d_details["img_url"] ?>" alt="Card image cap">
                                <div style="background: #fff; height: 250px;">
                                    <h4 class="card-title text-center" style="margin-top:10px;"><?php echo $d_details["actor_name"] ?></h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Birth Date: <?php echo $d_details["birth_date"] ?></li>
                                        <li class="list-group-item">Birth Place: <?php echo $d_details["birth_place"] ?></li>
                                    </ul>
                                </div>
                        </div>     
                <?php }?>                
            </div>
        </div>
    </body>
</html>