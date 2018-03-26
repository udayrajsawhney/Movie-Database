<?php require_once('../functions/functions.php');  ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    .navbar {
            height: 60px;
            background: rgba(0, 0, 0, .4) !important;
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
    a:hover {
            text-decoration: none;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
    <a class="navbar-brand" href="/">Movie Base</a>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%;display: grid !important; grid-template-columns: 65% 35%;padding-right:7%;">
    <form class="form-inline my-2 my-lg-0" method="GET" action="query.php">
        <input class="form-control mr-sm-2" style="width: 500px;" type="search" placeholder="Search By" aria-label="Search By" name="query">
        <input name="search_text" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
    </form>
    <div class="col-sm-10">
        <ul class="navbar-nav">
            <li class="nav-item mr-1">
                <a href="/directors.php" style="color:white;padding:5px;"><button class="btn btn-success">Directors</button></a>
            </li>
            <li class="nav-item mr-1">
                <a href="/actors.php" style="color:white;padding:5px;"><button class="btn btn-success">Actors</button></a>
            </li>
            <li class="nav-item mr-1">
                <a href="/index.php" style="color:white;padding:5px;"><button class="btn btn-success">Movies</button></a>
            </li>
            <li class="nav-item mr-1">
                <a href="/collaborations.php" style="color:white;padding:5px;"><button class="btn btn-success">Collaborations</button></a>
            </li>
            <li class="nav-item mr-1">
                <a href="/insert_movie.php" style="color:white;padding:5px;"><button class="btn btn-success">Add Movies</button></a>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" style="display: grid !important; grid-template-areas: '. list .'; grid-gap: 41%;" id="navbarSupportedContent">
        <ul class="navbar-nav" style="grid-area: list;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genres</a>
                <form action="/index.php" method="GET" name="genreSortForm">
                    <div class="dropdown-menu genres" aria-labelledby="navbarDropdown" id="genreDropdown"></div>
                </form>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ratings</a>
                <form action="/index.php" method="GET" name="ratingSortForm">
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown" id="ratingsDropdown"></div>
                </form>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Year</a>
                <form action="/index.php" method="GET" name="yearSortForm">
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown" id="yearDropdown"></div>
                </form>
            </li>
        </ul>
    </div>
</nav>

<script>
    function ratingFormSubmit()
    {
        document.ratingSortForm.submit();
    }
    function genreFormSubmit(){
      document.genreSortForm.submit();
    }
    function yearFormSubmit(){
      document.yearSortForm.submit();
    }

    var rangeRate = document.createElement("SELECT");
    rangeRate.setAttribute("style", "background: #fff; border: none; width: 100%;");
    rangeRate.setAttribute("name", "ratingList");
    rangeRate.setAttribute("onChange", "ratingFormSubmit()");
    var opt = document.createElement("OPTION");
    opt.setAttribute("value", "Rating");
    opt.setAttribute("class", "dropdown-item");
    opt.append(document.createTextNode("Rating"));
    rangeRate.append(opt);

    for(i=10; i>0; i--) {
            opt = document.createElement("OPTION");
            opt.setAttribute("value", i);
            opt.setAttribute("class", "dropdown-item");
            opt.append(document.createTextNode(i));
            rangeRate.append(opt);
    }
    document.getElementById('ratingsDropdown').append(rangeRate);


    const gens = ['Drama','Sci-Fi','Action','Family','Documentary','Music','War','Romance','Animation','Western','Thriller',
    'Musical','Sport','Comedy','News','Adventure','Crime','Fantasy','Horror','Mystery','History','Film-Noir','Biography']

    var geneDrop = document.createElement("SELECT");
    geneDrop.setAttribute("style", "background: #fff; border: none; width: 100%;");
    geneDrop.setAttribute("name", "genreList");
    geneDrop.setAttribute("onChange", "genreFormSubmit()");
    opt = document.createElement("OPTION");
    opt.setAttribute("value", "Genres");
    opt.setAttribute("class", "dropdown-item");
    opt.append(document.createTextNode("Genres"));
    geneDrop.append(opt);

    for(i=0; i<=22; i++) {
            opt = document.createElement("OPTION");
            opt.setAttribute("value", gens[i]);
            opt.setAttribute("class", "dropdown-item");
            opt.append(document.createTextNode(gens[i]));
            geneDrop.append(opt);
    }
    document.getElementById('genreDropdown').append(geneDrop);

    var yearDrop = document.createElement("SELECT");
    yearDrop.setAttribute("style", "background: #fff; border: none; width: 100%;");
    yearDrop.setAttribute("name", "yearList");
    yearDrop.setAttribute("onChange", "yearFormSubmit()");
    opt = document.createElement("OPTION");
    opt.setAttribute("value", "Year");
    opt.setAttribute("class", "dropdown-item");
    opt.append(document.createTextNode("Year"));
    yearDrop.append(opt);

    for(i=2018; i>=1950; i--) {
            opt = document.createElement("OPTION");
            opt.setAttribute("value", i);
            opt.setAttribute("class", "dropdown-item");
            opt.append(document.createTextNode(i));
            yearDrop.append(opt);
    }
    document.getElementById('yearDropdown').append(yearDrop);

</script>