create database users;
use users;
create table users(username varchar(20), email_address varchar(120), password varchar(40), salt varchar(7), primary key(username), unique(email_address));
select distinct length(password) from users;
create table products(username varchar(20), title varchar(50), price varchar(20), image varchar(50), producer varchar(50), category varchar(7), city varchar(20), primary key(username,title), foreign key(username) references users(username) on delete cascade);
select * from products;

insert into products values ("eneshasani","Mild Interruption", "100€", "../Images/abstract2.jpg", "Paint Me", "ART", "Prishtina"),("eneshasani","Mona Lisa and the Cat Lady", "130€", "../Images/abstract4.jpg", "Paint Me", "ART", "Prishtina"),("eneshasani","An Instinct for Dragons", "180€", "../Images/abstract3.jpg", "Paint Me", "ART", "Prishtina"),("eneshasani","Bucket Hat", "20€", "../Images/yarny2.png", "Yarnyhandmade", "ART", "Vushtrri"),("eneshasani","Crop Top", "25€", "../Images/yarny3.png", "Yarnyhandmade", "ART", "Vushtrri");
insert into products values("erlislushtaku","Drawing", "50€", "../Images/coloring.jpg", "Coloring Prishtina", "CULTURE", "Prishtina"),("erlislushtaku","Vizatimi", "50€", "../Images/main1.jpg", "2cm Humans", "CULTURE", "Prishtina"),("erlislushtaku","Baresha", "50€", "../Images/baresha.jpg", "Coloring Prishtina", "CULTURE", "Prishtina"),("erlislushtaku","Hyjnesha ne fron", "50€", "../Images/coloring.jpg", "Coloring Prishtina", "CULTURE", "Prishtina"),("erlislushtaku","Abstrakt", "50€", "../Images/main1.jpg", "2cm Humans", "CULTURE", "Prishtina");
insert into products values("donatsinani","Bakllav", "30\u20ac", "../Images/bakllav.png", "Flizza", "FOODS", "Prishtina"),("donatsinani","Fli", "25\u20ac", "ProductsImages/2.jfif", "Flizza", "FOODS", "Prishtina"),("egzongashi","Kadaif", "20\u20ac", "../Images/kadaif.jpg", "Flizza", "FOODS", "Prishtina"),("egzongashi","Chocolate Cake", "20\u20ac", "../Images/chocolate.jpg", "Dolcetto Vjosa", "FOODS", "Prishtina"),("egzongashi","Fruit Cake", "20\u20ac", "../Images/heart.jpg", "Dolcetto Vjosa", "FOODS", "Prishtina");

