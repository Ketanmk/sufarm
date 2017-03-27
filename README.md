# Installation 
1- clone the Git Repository
 
2- Run 

```php
composer install
```

3- create database 

4- run 
```php
php artisan install
```
and follow instructions 

# Note : 
If installation failed you need to follow the second option 

1- rename 1.env to .env 

2- open .env file and edit it for : 
```php

DB_HOST=your host (usually localhost)
DB_DATABASE=your database name
DB_USERNAME=database usernamee
DB_PASSWORD=database password
DB_PORT=database port (usually 3306)
```

3- run 
```php
php artisan migrate
```
4- finally  run 
```php
php artisan db:seed
```
# Admin Credentials 
```php
user email : admin@admin.com

password : 123456
```
# Api 

# All Galleries 

```php
URL/api/v1/galleries
```

# Specefic gallery

```php
URL/api/v1/galleries/{ID}
```

# Childs Galleries from one gallery 

```php
URL/api/v1/galleries/{ID}/galleries
```

# Gallery Photos 
```php
URL/api/v1/galleries/{ID}/photos

```
# Specific Photo 

```php
URL/api/v1/photos/{ID}

```

Have Fun :) :) 