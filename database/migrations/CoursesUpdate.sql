ALTER TABLE courses ADD isfree boolean NULL;
ALTER TABLE courses ADD tags varchar(255) NULL;
ALTER TABLE courseslessons ADD tags varchar(255) NULL;

ALTER TABLE courses MODIFY COLUMN price decimal(8,2) NULL;

CREATE TABLE lessonrating (
    id int AUTO_INCREMENT PRIMARY KEY,
    id_user int NOT NULL,
    id_lesson int NOT NULL,
    rate int NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL
    )

CREATE TABLE lessoncomments (
    id int AUTO_INCREMENT PRIMARY KEY,
    id_user int NOT NULL,
    id_lesson TEXT NOT NULL,
    comment int NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL
    )