<?php
require_once("con.php");
session_start();
class Functions
{
    public function __construct() {
        
        $connect  = new Config();
        $this->db = $connect->connection();
        date_default_timezone_set("Asia/Kolkata");
    }
    
    public function show_movies() {

        $res = $this->db->query("SELECT * FROM Movies ORDER BY RAND() LIMIT 20");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function sortMovieAccordingToRatings($rate) {

        $res = $this->db->query("SELECT * FROM Movies WHERE rating>='$rate' ");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function sortMovieAccordingToGenres($genre) {

        $res = $this->db->query("SELECT * from movies where mid in 
                                        (select mid from movie_has_genres where gid in 
                                                (select gid from genres where genre_type='$genre'));");
        if ($res->num_rows > 0) {
            echo "hello";
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function sortMovieAccordingToYear($year) {

        $res = $this->db->query("SELECT * FROM Movies WHERE year='$year'");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function show_Actors() {

        $res = $this->db->query("SELECT * FROM Actors ORDER BY RAND() LIMIT 16");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function show_Directors() {

        $res = $this->db->query("SELECT * FROM Directors ORDER BY RAND() LIMIT 16");
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return FALSE;
        }
    }
    
    public function insert_movie($movie_name, $synopsis, $rating, $year, $gross, $duration, $cover_link, $torrent_link, $contributor) {
        
        $res = $this->db->query("INSERT INTO Movies (movie_name,synopsis,rating,year,gross,duration,cover_link,torrent_link,contributor) 
        VALUES ('$movie_name','$synopsis','$rating','$year','$gross','$duration','$cover_link','$torrent_link','$contributor')");
        return $res;
    }
    
    public function show_movie_actors($movie_id) {

        $res = $this->db->query("SELECT * FROM Actors WHERE aid in (SELECT aid FROM movie_has_actors WHERE mid = '$movie_id')");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }
    
    public function show_movie_directors($movie_id) {

        $res = $this->db->query("SELECT * FROM Directors WHERE did in (SELECT did FROM movie_has_directors WHERE mid = '$movie_id')");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }

    public function query_movies($query) {

        $str = '%'.$query.'%';
        $res = $this->db->query("SELECT * FROM Movies WHERE movie_name LIKE '$str'");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }

    public function query_actors($query) {

        $str = '%'.$query.'%';
        $res = $this->db->query("SELECT * FROM Actors WHERE actor_name LIKE '$str'");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }

    public function query_directors($query) {

        $str = '%'.$query.'%';
        $res = $this->db->query("SELECT * FROM Directors WHERE dir_name LIKE '$str'");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }

    public function directors_actors() {

        $res = $this->db->query("SELECT aid, did FROM movie_has_actors 
                                    INNER JOIN movie_has_directors ON movie_has_actors.mid = 
                                        movie_has_directors.mid ORDER BY RAND();");
        if ($res->num_rows > 0)
            return $res;
        else
            return FALSE;
    }

    public function get_actor_details($aid) {
        $res = $this->db->query("SELECT * FROM Actors WHERE aid='$aid'");
        if ($res->num_rows > 0)
        return $res->fetch_assoc();
            else
        return FALSE;
    }

    public function get_dir_details($did) {
        $res = $this->db->query("SELECT * FROM Directors WHERE did='$did'");
        if ($res->num_rows > 0)
        return $res->fetch_assoc();
            else
        return FALSE;
    }
}
$functions = new Functions();