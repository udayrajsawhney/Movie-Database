use movie_database;
CREATE TABLE Actors (
    aid int,
    actor_name VARCHAR(50),
    birth_date DATE,
    birth_place VARCHAR(50),
    img_url VARCHAR(200),
    PRIMARY KEY (aid)
);

load data local infile "/Users/siddhantkushwaha/Desktop/all_actors2.txt" into table Actors fields terminated by '$';
