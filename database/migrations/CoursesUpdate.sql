ALTER TABLE courses ADD isfree boolean NULL;
ALTER TABLE courses ADD tags varchar(255) NULL;
ALTER TABLE courseslessons ADD tags varchar(255) NULL;

ALTER TABLE courses MODIFY COLUMN price decimal(8,2) NULL;
