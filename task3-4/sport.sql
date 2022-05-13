CREATE table sportsman(   id_sportsman INT PRIMARY KEY AUTO_INCREMENT,
                          FNP VARCHAR(255),
                          email VARCHAR(255),
                          phone_number VARCHAR(11),
                          birthday date,
                          age int,
                          creating_at datetime,
                          passport_number int(15),
                          middle_place int(11),
                          biografhy VARCHAR(255),
                          video LONGBLOB)

SELECT sportsman_id, FNP
FROM competitions
JOIN sportsman ON sportsman_id = id_sportsman
GROUP BY sportsman_id
ORDER BY count(*) DESC
    LIMIT 5;

