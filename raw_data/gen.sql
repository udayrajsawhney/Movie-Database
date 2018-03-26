use movie_database;
drop tables genres;
CREATE TABLE Genres (
    gid int,
    genre_type VARCHAR(20),
    PRIMARY KEY(gid)
);

load data local infile "/Users/siddhantkushwaha/Desktop/gen_o2.txt" into table Genres fields terminated by ' ';
