use movie_database;
drop tables directors;
CREATE TABLE Directors (
    did int,
    dir_name VARCHAR(50),
    birth_date DATE,
    birth_place VARCHAR(50),
    img_url VARCHAR(200),
    PRIMARY KEY (did)
);

load data local infile "/Users/siddhantkushwaha/Desktop/all_directors2.txt" into table Directors fields terminated by '$';
