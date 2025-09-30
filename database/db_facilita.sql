DROP DATABASE IF EXISTS db_facilita; 
CREATE DATABASE db_facilita;
USE db_facilita;

-- Tabela: Cafeterias
CREATE TABLE cafes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    cnpj VARCHAR(20) UNIQUE,
    address TEXT,
	deleted bool DEFAULT FALSE
);

-- Tabela: Usuários
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password TEXT,
    phone VARCHAR(20),
    photo varchar(255),
    role ENUM('admin', 'owner', 'employee'),
	deleted bool DEFAULT FALSE,
    cafe_id INT UNSIGNED,
    FOREIGN KEY (cafe_id) REFERENCES cafes(id)
);

-- Tabela: Categorias de Produtos
CREATE TABLE categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

-- Inserindo as 3 categorias fixas
INSERT INTO categories (name) VALUES 
('doce'), 
('salgado'), 
('bebida');

-- Tabela: Produtos (Cardápio / Estoque) com categoria
CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    unit VARCHAR(20),
    stock_quantity INT,
    stock_min INT,
	deleted bool DEFAULT FALSE,
    cafe_id INT UNSIGNED,
    category_id INT UNSIGNED,
    FOREIGN KEY (cafe_id) REFERENCES cafes(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Tabela: Movimentações de Estoque
CREATE TABLE stock_movements (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED,
    type ENUM('in', 'out'),
    quantity INT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reason TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Tabela: Pedidos
CREATE TABLE orders (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    customer_phone VARCHAR(20),
    status ENUM('concluido', 'pendente'),
    description TEXT,
    cafe_id INT UNSIGNED,
    FOREIGN KEY (cafe_id) REFERENCES cafes(id)
);

-- Tabela: Itens do Pedido
CREATE TABLE order_items (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT UNSIGNED,
    product_id INT UNSIGNED,
    size VARCHAR(50),
    quantity INT,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Tabela: Tarefas
CREATE TABLE tasks (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    status ENUM('concluida', 'pendente'),
    user_id INT UNSIGNED,
    cafe_id INT UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (cafe_id) REFERENCES cafes(id)
);


