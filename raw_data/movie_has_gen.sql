use movie_database;
drop table movie_has_genres;
CREATE TABLE movie_has_genres(
    mid int,
    gid int,
    PRIMARY KEY(mid, gid)
);

load data local infile "/Users/siddhantkushwaha/Desktop/work/dbms/raw_data/movie_has_gen.txt" into table movie_has_genres fields terminated by ' ';
