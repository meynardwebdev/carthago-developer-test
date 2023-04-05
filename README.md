# PHP Developer - Technical Test

## How to setup the simple way

1. Clone repository and move to the project folder:
    ```
    $ git clone 
    $ cd carthago-test
    ```

2. Install dependencies via composer:
    ```
    $ composer install
    ```

3. Install frontend dependencies via npm:
    ```
    $ npm install
    ```
   
4. Compile frontend assets via npm:
    ```
    $ npm run dev
    ```

5. Import the database dump from database/sample_db_dump.sql via phpMyAdmin or any MySQL db setup you have


6. Start web server
    ```
    $ php artisan serve
    ```


## How to setup the hard way via ddev-local

### Prerequisite
- Install ddev-local on your local machine first: https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/
- For my setup since I'm using a Windows machine, I use WSL2 + Docker Desktop setup
    1. https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/#windows
    2. Run Docker (make sure that WSL integration is enabled)
    3. Open WSL2 terminal and move to home directory:
    ```
    $ cd ~  
    ```

### Start setting up the project

1. Clone repository and move to the project folder:
    ```
    $  && cd carthago-test 
    ```

2. Install dependencies via composer:
    ```
    $ ddev composer install
    ```

3. Install frontend dependencies via npm:
    ```
    $ ddev npm install
    ```

4. Compile frontend assets via npm:
    ```
    $ ddev npm run dev
    ```

5. Copy .env.example to .env and update the database credentials
    ```
    $ cp .env.example .env
    ```
   
6. Import database:
    ```
    $ ddev mysql -u <user> -p<password> <db_name> < database/sample_db_dump.sql
    ```

7. Start web server
    ```
    $ ddev start
    ```

