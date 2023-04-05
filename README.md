# PHP Developer - Technical Test

## How to setup the simple way

### Prerequisite

- Atleast PHP 8
- MariaDB version 10.4 or any compatible MySQL version
- Nodejs 16 or higher
- NPM
- Composer
- Git

### Start setting up the project

1. Clone repository and move to the project folder:
    ```
    $ git clone https://github.com/meynardwebdev/carthago-developer-test.git
    $ cd carthago-test
    ```

1. Install dependencies via composer:
    ```
    $ composer install
    ```

1. Install frontend dependencies via npm:
    ```
    $ npm install
    ```

1. Compile frontend assets via npm:
    ```
    $ npm run dev
    ```

1. Run database migration via artisan:
    ```
    $ php artisan migrate
    ```

1. Import the database dump from database/sample_db_dump.sql via phpMyAdmin or any MySQL db setup you have

1. Copy .env.example to .env
    ```
    $ cp .env.example .env
    ```

1. Start web server
    ```
    $ php artisan serve
    ```

1. Open browser and go to: http://127.0.0.1:8000

1. Login using the credentials below:
    ```
    email: admin@test.net
    pass: password
    ```

## How to setup the project via ddev-local

### Prerequisite

- Install ddev-local on your local machine first: https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/
- For my setup since I'm using a Windows machine, I use WSL2 + Docker Desktop setup
    1. https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/#windows
    1. Run Docker (make sure that WSL integration is enabled)
    1. Open WSL2 terminal and move to home directory:
        ```
        $ cd ~ 
        ```
- Composer
- Git

### Start setting up the project

1. Clone repository and move to the project folder:
    ```
    $ git clone https://github.com/meynardwebdev/carthago-developer-test.git && cd carthago-test 
    ```

1. Install dependencies via composer:
    ```
    $ ddev composer install
    ```

1. Install frontend dependencies via npm:
    ```
    $ ddev npm install
    ```

1. Compile frontend assets via npm:
    ```
    $ ddev npm run dev
    ```

1. Copy .env.example to .env and update the database credentials
    ```
    $ cp .env.example .env
    ```

1. Start ddev-local
    ```
    $ ddev start
    ```

1. Run database migration via artisan:
    ```
    $ ddev artisan migrate
    ```

1. Import database via command line:
    ```
    $ ddev mysql -u db -pdb db < database/sample_db_dump.sql
    ```
   or import it on ddev-local phpMyAdmin via browser (https://carthagotest.ddev.site:8037):
   ```
   // check the url of the phpMyAdmin
   $ ddev describe
   ```

1. Open browser and go to: https://carthagotest.ddev.site

1. Login using the credentials below:
    ```
    email: admin@test.net
    pass: password
    ```

PS: The reason why I used ddev-local is that the PHP, MySQL and Node server is already setup, this will be good for other
developers to easily setup the project without worrying what PHP and MySQL versions to install
