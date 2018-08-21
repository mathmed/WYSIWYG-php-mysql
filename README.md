# WYSIWYG-php-mysql
An little example of a POST WYSIWYG using PHP7, jQuery and MySQL

## How to use

First of all, download the example on your computer
```html
$ git clone https://github.com/mathmed/WYSIWYG-php-mysql.git
```

after downloaded, go to the path 
```html
    /database/config.php
``` 
and set the credentials of your database. In the same folder, select the `wysiwyg.sql` file and import in your database.

## Structure

On the `/database` path are located the configuration files for database connection. In the `config.php` file you can set your database credentials. `The connection.php` file is responsible for making the connection to the database as well as adding and deleting rows.

On the `/files` path are located the medias and connfiguration files. In the `upload.php` the file is uploaded to the destination folder and in `del.php` the file is deleted.

On the `root` are located the `index.php`, `preview.php`, `view.php` and `main.js`. The `index.php` redirects the user to the view.php file, where it is located the frontend aplication. The DOM control functions are located in the `main.js` file. The application control functions are located in the `controller.php` file.

## Dependencies

The plugin `Kartik file input` is used in this project. 

