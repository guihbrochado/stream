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
      
CREATE TABLE IF NOT EXISTS blogcategories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(200) NOT NULL,
    status BOOLEAN NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS blogimages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    imgfile VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS blog (
    id SERIAL PRIMARY KEY,        
    titulo VARCHAR(200) NOT NULL,			
    subtitulo VARCHAR(200) NOT NULL,			
    author VARCHAR(200) NOT NULL,			
    duration time,			
    idtema INT,			
    idcategory INT,			
    conteudo VARCHAR(5000) NOT NULL,			
    status BOOLEAN,						      	
    imgcapa VARCHAR(5000),		
    audiofile VARCHAR(5000),		
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    idusuario_inclusao INTEGER,
    idusuario_alteracao INTEGER,
    CONSTRAINT fk_blog_category FOREIGN KEY (idcategory) REFERENCES blogcategories(id)
);

CREATE TABLE blogcomments (
    id int AUTO_INCREMENT PRIMARY KEY,
    id_user int NOT NULL,
    id_blog int NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE userlessonsopeneds (
    id_order int NULL,
    id_user int NOT NULL,
    id_lesson int NOT NULL,
    current_time time NULL,
    total_time time NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)


ALTER TABLE live_rooms ADD COLUMN link_admin VARCHAR(200) NULL;
ALTER TABLE live_rooms ADD COLUMN link_client VARCHAR(200) NULL;
