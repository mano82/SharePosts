# SharePosts
Simple post sharing website made for study with the TraversyMVC PHP Framework developed during PHP OOP and MVC Course on Udemy by Brad Traversy.

This is a simple website made with OOP PHP and using MVC structure.

It consists of:
- User Registration
- Post publication (Show, Add, Edit, Remove)

# Installation

Installation is very simple and requires to change information in 2 files: `public/.htacess` and `app/config/config.php`

## public/.htaccess

```Apache
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /shareposts/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

Change the row: `RewriteBase /shareposts/public` with the root folder of your website (i.e. in most cases it is sufficient to simply remove `/shareposts`.

## app/config/config.php

```PHP
    // DB Params
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','mano');
    define('DB_NAME','shareposts');
    define('DB_PREFIX', 'sp_');

    // App Root
    define ('APPROOT', dirname(dirname(__FILE__)));
    // URL Root
    define ('URLROOT', 'http://localhost/shareposts');
    // SITE NAME
    define ('SITENAME', 'SharePosts');
    // VERSION
    define('APPVERSION', '1.0.0');
```

- Change the DB Params to those of your database
- Change the URL Root to your website server
- Change the Sitename as you wish
- Change the AppVersion as necessary

## Database

The website requires only 2 tables: `posts` and `users`.

### users table

|NAME       |TYPE         |DEFAULT VALUE      |EXTRA        |
|-----------|-------------|-------------------|-------------|
|id         |int(11)      |                   |PRIMARY A.I. |
|name       |varchar(255) |                   |             |
|email      |varchar(255) |                   |             |
|password   |varchar(255) |                   |             |
|created_at |datetime     |CURRENT_TIMESTAMP  |             |

### posts table

|NAME       |TYPE         |DEFAULT VALUE      |EXTRA        |
|-----------|-------------|-------------------|-------------|
|id         |int(11)      |                   |PRIMARY A.I. |
|user_id    |int(11)      |                   |             |
|title      |varchar(255) |                   |             |
|body       |varchar(255) |                   |             |
|created_at |datetime     |CURRENT_TIMESTAMP  |             |
