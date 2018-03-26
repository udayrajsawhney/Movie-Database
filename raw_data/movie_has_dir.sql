use movie_database;
drop table movie_has_directors;
CREATE TABLE movie_has_directors(
    mid int,
    did int,
    PRIMARY KEY(mid, did)
);

load data local infile "/Users/siddhantkushwaha/Desktop/work/dbms/raw_data/movie_has_dir.txt" into table movie_has_directors fields terminated by ' ';
