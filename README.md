LightSchool API
===============
Today we present you a fast and convenient way to share homework between classmates – LightSchool API!

For easy setup, we'll need:
- Device with LightSchool and Internet connection
- Hosting with support for PHP + MySql (even free) and the ability to connect via FTP

## Сonfiguring the server:
Download the necessary files from this link:
https://github.com/alexChurkin/LightSchool-Homework-API
Our API is located in the API folder.

Then in phpMyAdmin create a new MySql database and a table with any convenient name (for example table_homework).

Then edit the constants in the config file we downloaded.php.

**HOST** can be changed if something else is specified on the hosting instead of localhost;

**USERNAME** – the username from a MySql (which we introduce in php);

**PASS** – password used to log into MySql;

**DBNAME** – the name of the database we will use;

**ADMIN_TOKEN** – here you must enter the password to add/change / delete homework;

**TABLE** – name of the table we created.

Connect via FTP, upload all these files to any publicly visible folder on the server. Next, go to phpMyAdmin, create a table by this command:
```sql
CREATE TABLE `database_name`.`table_homework` ( `id` INT NOT NULL AUTO_INCREMENT , `timestamp` INT NOT NULL , `subject` TEXT NOT NULL , `hometask` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

The server is successfully configured!

## Configuring the application:
Go to settings -> homework, select "**Server administration mode**".

In the field "Full server url" specify the address of the folder where we put our API files. For example: http://api.lightschool.com/homework/

In the "Administrator token" field enter ADMIN_TOKEN which we have written to the config.php.

It's time to write your first homework. Click on the plus sign in the upper right corner, write a subject and a homework.

Excellent, everything is ready to use.
