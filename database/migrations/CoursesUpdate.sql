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


    CREATE TABLE IF NOT EXISTS blog (
        id serial PRIMARY KEY,        
        titulo varchar(200) NOT NULL,			
        subtitulo varchar(200) NOT NULL,			
        idtema int NOT NULL,			
        conteudo varchar(5000) NOT NULL,			
        status boolean,						      	
        imgcapa varchar(5000),		
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        deleted_at timestamp NULL DEFAULT NULL,
        idusuario_inclusao INTEGER,
        idusuario_alteracao INTEGER,
        idusuario_exclusao INTEGER
    );

    CREATE TABLE IF NOT EXISTS blogtema (
        id serial PRIMARY KEY,
        descricao varchar(200) NOT NULL,			
        status boolean NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        deleted_at timestamp NULL DEFAULT NULL,
        idusuario_inclusao INTEGER,
        idusuario_alteracao INTEGER,
        idusuario_exclusao INTEGER
    );

