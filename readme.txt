E:\Dev\it30a-BONGCAO\backups

1. CREATE DATABASE <database_name?;
2. SHOW DATABESES;
3. CONNECT <database_name>;
4. CREATE TABLE <table_name_in_prural> ();
5. INSERT INTO <table_name_in_prural>
(columns)
VALUES(values);
UTILITY commands
\! cls 
source E:\Dev\it30a-BONGCAO\backups\08182026_library_db.sql

mysqldump -u root -p --databases library_db > E:\Dev\it30a-BONGCAO\backups\08182026_library_db.sql 


mysqldump -u root -p --databases library_db > E:\Dev\it30a-BONGCAO\backups\%date:~-4%_%date:~4,2%_%date:~7,2%_%time:~0,2%_%time:~3,2%_%time:~6,2%_library_db.sql

mysqldump -u root -p --databases library_db > "E:\Dev\it30a-BONGCAO\backups\%date:~-4%_%date:~4,2%_%date:~7,2%_%time:~0,2%_%time:~3,2%_%time:~6,2%_library_db.sql"

mysqldump -u root -p --databases library_db > E:\Dev\it30a-BONGCAO\backups\%date:~-4%_%date:~4,2%_%date:~7,2%_%time:~0,2%_%time:~3,2%_%time:~6,2%_library_db.sql"

mysqldump -u root -p --databases library_db > "E:\Dev\it30a-BONGCAO\backups\%date:~-4%_%date:~4,2%_%date:~7,2%_%time:~0,2%_%time:~3,2%_%time:~6,2%_library_db.sql"

ALTER TABLE students ADD COLUMN stduent_created_at TIMESTAMP NULL DEFAULT NULL;
UPDATE students SET stduent_created_at = CURRENT_TIMESTAMP WHERE stduent_created_at IS NULL;
ALTER TABLE students MODIFY COLUMN stduent_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
//dsayidgsa





