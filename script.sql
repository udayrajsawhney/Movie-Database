use movie_database;

ALTER TABLE movies add column contributor VARCHAR(20) DEFAULT 'System';

CREATE TRIGGER contrib_check BEFORE INSERT ON 
    movies FOR EACH ROW IF NEW.contributor = 'System' THEN SET NEW.contributor = 'Anonymous'; END IF;

CREATE TRIGGER gross_check BEFORE INSERT ON 
    movies FOR EACH ROW IF NEW.gross < 0 THEN SET NEW.gross = 0; END IF;

CREATE TRIGGER duration_check BEFORE INSERT ON 
    movies FOR EACH ROW IF NEW.duration < 0 THEN SET NEW.duration = 0; END IF;

INSERT INTO Movies (movie_name,synopsis,rating,year,gross,duration,cover_link,torrent_link) 
        VALUES ('sid', 'aaa', '6', '2020', '-78', '-5', 'sdvkdfbl', 'sjmf');

ALTER TABLE movies
MODIFY COLUMN mid int AUTO_INCREMENT;

delete from movies where movie_name = 'sid';