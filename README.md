##  Equilibrium Challenge Documentation!
### Here you'll find proper instructions for the steps to set up the System Project:

### 1. Requirements

The Equilibrium Challenge Project was developed under Laravel Framework version 7.0.* and it contains all source codes for
the backend API service and Administrative System.

- Laravel Requirements:
    - PHP >= 7.1.* Along with following extensions:
        - php7.1-mbstring
        - php7.1-dom
        - php7.1-zip
        - php7.1-curl
        - Set always_populate_raw_post_data = -1 inside php.ini file.
    - [Composer](https://getcomposer.org/download/) latest version: a PHP dependency manager.
        - Make composer to be global. If running on Ubuntu, run:
            - mv composer.phar /user/local/bin/composer
- MySQL: version >= 5.7.19

- [NodeJS & NPM](https://nodejs.org/en/): version >= 6.11


### 2. Fresh Installation

- **Download the Project Repository:**
    - git clone https://github.com/argus-cs/equilibrium_challenge.git

- **Install all PHP composer dependencies:**
    - composer install

- **Creating Environment File:**
    - copy .env.example .env (use cp or copy)

- **Generate Artisan Key:**
    - php artisan key:generate

- **Open .env file and modify databases details with server's database info.**

- **Install NPM dependencies by running:**
    - npm install

- **Compile Assets by running:**
    - npm run dev  (for development)
    - npm run prod (for production)
    - npm run watch (for watching assets changes during development)
    - See the package.json for more webpack compilation options.

- **Run migration for table and data creation:**
    - php artisan migrate --seed

- **Run the project:**
    - php artisan serve --host localhost --port 8000
    - **localhost can be the server's IP address**

-**Go to Staffs route:**
  - go to localhost:8000/staffs/ to see the application

### 3. License

- The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
