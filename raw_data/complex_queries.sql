select movie_name from movies where mid in 
    (select mid from movie_has_genres where gid in 
        (select gid from genres where genre_type='$genre'));

mysqldump -u root -p movie_database > movie_database.sql

mysql movie_database -u root -p < "/Users/udaysawhney/Desktop/dbms_project/dbms_project/movie_database.sql"

ALTER TABLE Movies MODIFY COLUMN mid INT auto_increment;

update actors set img_url="https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png" where img_url = "http://st1.bgr.in/wp-content/uploads/2015/11/anonymous-hackers-stock-image.jpg";
update directors set img_url="https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png" where img_url = "http://st1.bgr.in/wp-content/uploads/2015/11/anonymous-hackers-stock-image.jpg";

ALTER TABLE Actors MODIFY COLUMN img_url VARCHAR(200) DEFAULT "https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png";
ALTER TABLE Directors MODIFY COLUMN img_url VARCHAR(200) DEFAULT "https://www.internet.asn.au/wp-content/uploads/2016/09/unknown-male-200x300.png";


ALTER TABLE movie_has_directors ADD CONSTRAINT FK_movie_has_directors FOREIGN KEY (mid) REFERENCES Movies(mid) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE movie_has_directors ADD CONSTRAINT FK_movie_has_directors_2 FOREIGN KEY (did) REFERENCES Directors(did) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE movie_has_genres ADD CONSTRAINT FK_movie_has_genres FOREIGN KEY (mid) REFERENCES Movies(mid) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE movie_has_genres ADD CONSTRAINT FK_movie_has_genres_2 FOREIGN KEY (gid) REFERENCES Genres(gid) ON UPDATE CASCADE ON DELETE CASCADE;

SELECT CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = 'movie_has_directors';

SELECT CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = 'movies';

ALTER TABLE Movies ENGINE = InnoDB;

SELECT aid, did FROM movie_has_actors INNER JOIN movie_has_directors ON movie_has_actors.mid = movie_has_directors.mid order by aid, did;