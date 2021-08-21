<?php

include ('DB_Connector.php');

function Create_Products_Table(){
    $connection = DB_Connection_Start();

    $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS Products (
        p_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        p_name VARCHAR(30) NOT NULL UNIQUE,
        p_category VARCHAR(50) NOT NULL,
        p_subcategory VARCHAR(50) NOT NULL,
        p_unit_buying_price DECIMAL(10,0) NOT NULL,
        p_unit_selling_price DECIMAL(10,0) NOT NULL,
        p_available_amount INT(11) NOT NULL,
        p_unit VARCHAR(30) NOT NULL,
        p_brand VARCHAR(30),
        p_description VARCHAR(255) ,
        p_image VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    //mysqli_query($connection, $CREATE_TABLE);
    $statement = $connection->prepare($CREATE_TABLE);
    $statement->execute();
    $statement->close();

    DB_Connection_Close($connection);
}

function Create_Category_Table(){
    $connection = DB_Connection_Start();

    $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS Category (
        cat_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        cat_name VARCHAR(50) UNIQUE NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $statement = $connection->prepare($CREATE_TABLE);
    $statement->execute();
    $statement->close();

    $INSERT = "INSERT INTO Category(cat_name) VALUES ('Groceries'),('Fish and Meat'),('Vegetable and Fruit'),('Chocolate and Icecream'), ('Chips and Snacks'),('Frozen food and Can food'),('Baby Zone'),('Womens section')";
    mysqli_query($connection, $INSERT);

    DB_Connection_Close($connection);
}

function Create_Subcategory_Table(){
    $connection = DB_Connection_Start();

    $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS Subcategory (
        sub_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        category_name VARCHAR(50) NOT NULL,
        subcat_name VARCHAR(50) UNIQUE NOT NULL,
        INDEX par_ind (category_name),  
        CONSTRAINT fk_category FOREIGN KEY (category_name)  REFERENCES category(cat_name)  ON DELETE CASCADE  ON UPDATE CASCADE,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $statement = $connection->prepare($CREATE_TABLE);
    $statement->execute();
    $statement->close();

    $INSERT = "INSERT INTO Subcategory(category_name, subcat_name) VALUES ('Fish and meat', 'Fish'), ('Fish and meat', 'Prawn'),('Fish and meat', 'Meat'),('Fish and meat', 'Chicken'),('Fish and meat', 'Duck'),('Vegetable and fruit', 'Vegetable'),('Vegetable and fruit', 'Fruit'),('Chocolate and Icecream', 'Chocolate'),('Chocolate and Icecream', 'Icecream'),('Chips and Snacks', 'Beverages'),('Chips and Snacks', 'Chips'),('Chips and Snacks', 'Snacks'),('Frozen food and Can food', 'Frozen food'),('Frozen food and Can food', 'Can food'),('Baby Zone', 'Food'),('Baby Zone', 'B-Toiletries'),('Baby Zone', 'Cloth'),('Baby Zone', 'Essential'), ('Baby Zone', 'Toy'),('Womens section', 'Cosmetics'),('Womens section', 'fashion'),('Womens section', 'feminine hygiene'),('Groceries', 'cooking'),('Groceries', 'baking'),('Groceries', 'dairy'),('Groceries', 'condiments'),('Groceries', 'spices'),('Groceries', 'breads'),('Groceries', 'paper and wrap'),('Groceries', 'toiletries'),('Groceries', 'household')";

    mysqli_query($connection, $INSERT);

    DB_Connection_Close($connection);
}

function Create_Employees_Table(){
    $connection = DB_Connection_Start();

    $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS Employees (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        e_id VARCHAR(16) NOT NULL UNIQUE,
        e_name VARCHAR(30) NOT NULL,
        e_degsignation VARCHAR(30) NOT NULL,
        e_email VARCHAR(30) NOT NULL,
        e_phone VARCHAR(30) NOT NULL,
        e_payment INT(10) NOT NULL,
        e_date_of_birth DATE NOT NULL,
        e_blood_group CHAR(3) NOT NULL,
        e_nid_or_bc VARCHAR(30) NOT NULL,
        e_father_name VARCHAR(30) NOT NULL,
        e_mother_name VARCHAR(30) NOT NULL,
        e_present_address VARCHAR(255) NOT NULL,
        e_permanent_address VARCHAR(255) NOT NULL,
        e_password VARCHAR(255) NOT NULL,
        e_image VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    //mysqli_query($connection, $CREATE_TABLE);
    $statement = $connection->prepare($CREATE_TABLE);
    $statement->execute();
    $statement->close();

    DB_Connection_Close($connection);
}

function Create_Customers_Table(){
    $connection = DB_Connection_Start();

    $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS Customers (
        c_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        c_name VARCHAR(30) NOT NULL,
        c_email VARCHAR(30) NOT NULL,
        c_phone VARCHAR(30) NOT NULL,
        c_password VARCHAR(30) NOT NULL,
        c_image VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    //mysqli_query($connection, $CREATE_TABLE);
    $statement = $connection->prepare($CREATE_TABLE);
    $statement->execute();
    $statement->close();

    DB_Connection_Close($connection);
}


function Create_Orders_Table(){
    $connection = DB_Connection_Start();

    $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS Orders (
        order_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        customer_id VARCHAR(255) NOT NULL,
        order_products_list VARCHAR(255) NOT NULL,
        order_price DECIMAL(10,0) NOT NULL,
        order_status VARCHAR(30) NOT NULL,
        order_payment_method VARCHAR(30),
        order_delivary_id INT(11),
        order_boy_id INT(11),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    //mysqli_query($connection, $CREATE_TABLE);
    $statement = $connection->prepare($CREATE_TABLE);
    $statement->execute();
    $statement->close();

    DB_Connection_Close($connection);
}

?>