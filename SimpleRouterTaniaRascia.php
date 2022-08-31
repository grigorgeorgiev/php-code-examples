
The Simplest PHP Router

I wanted to create the absolute most basic routing code in PHP, so here it is. We will direct ALL traffic to index.php and route to the new files from there.

Redirect all requests to index.php

In the root of your project, create a .htaccess file that will redirect all requests to index.php.

.htaccess

RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php [QSA,L]

Create a routing switch

Get the requested path with $_SERVER['REQUEST_URI'], and require the page you want to display. I have '' and '/' for both url.com/ and url.com.

index.php

<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

Create the views

Create a /views directory and place the files.

/views/index.php

<h1>Main</h1>

/views/about.php

<h1>About</h1>

/views/404.php

<h1>404</h1>
