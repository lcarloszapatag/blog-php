CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    createdAt DATE NOT NULL,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT pk_users PRIMARY KEY (id)
);

CREATE TABLE categories (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    createdAt DATE NOT NULL,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT pk_categories PRIMARY KEY( id)
);

CREATE TABLE posts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    category_id INT(11) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description MEDIUMTEXT,
    createdAt DATE NOT NULL,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT pk_posts PRIMARY KEY (id),
    CONSTRAINT fk_post_user FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_post_category FOREIGN KEY (category_id) REFERENCES categories(id)
);
