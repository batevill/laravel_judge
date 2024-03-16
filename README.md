#### Setup Project
```bash

# install composer dependency
composer install

# create a environment file
cp .env.example .env

# set the Application key
php artisan key:generate

# setup the database credentials and migrate database with seeders
 php artisan migrate:fresh --seed

#login parol
'email' => 'admin@gmail.com',
'password' => bcrypt('12345678'),

