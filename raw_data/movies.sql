drop table movies;
CREATE TABLE Movies(
    mid int,
    movie_name VARCHAR(75),
    synopsis VARCHAR(500),
    rating real,
    year int,
    duration int,
    gross int,
    cover_link VARCHAR(100),
    torrent_link VARCHAR(100),

    PRIMARY KEY(mid)
);

load data local infile "/Users/siddhantkushwaha/Desktop/work/dbms/mov_o2.txt" into table Movies fields terminated by '@';