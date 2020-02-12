            =========================================================
            |                Task for XpeedStudio                   |
            |                Author : Prappo Islam Prince           |
            |                Email : prappo.prince@gmail.com        |
            |                                                       |
            =========================================================

Simple PHP form submission script with
frontend validation

Important : No PHP application framework used. Full MVC pattern and code wrote by own.

How to use :
Instructions :
1) Make sure you have internet connectivity because bootstrap & Jquery CDN has been used.
2) Create a database on your MySQL database server and upload the database file found in the root of the folder
called "db.sql".
3) Put database credentials at "app/Core/Database.php";
4) Front-end validation code will be found in "app/Views/home.php".
5) Backend-end code for storing data and validation will be found in "app/Controller/BuyerController.php".
6) Buyer.php file is responsible for Buyer Model found at "app/Controller/Buyer.php";
7) Used "illuminate/database" library for clean and OOP data insertion code purpose.
8) Report URL "/report" and file will be found in "app/Views/report.php".

Description :
All core files will be found at "app/Core".
Controller , Models and Views file will be found at "app";
Route file will be found at "app/web.php".
Database file will be found at "app/Core/Database.php"