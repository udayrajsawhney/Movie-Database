use movie_database;
drop table movie_has_actors;
CREATE TABLE movie_has_actors(
    mid int,
    aid int,
    PRIMARY KEY(mid, aid)
);

load data local infile "/Users/siddhantkushwaha/Desktop/work/dbms/raw_data/movie_has_actors.txt" into table movie_has_actors fields terminated by ' ';
