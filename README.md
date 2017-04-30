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
sudo chmod -R 777 storage/ bootstrap/cache uploads/
```
4- run 
```php
php artisan migrate
```
5- finally  run 
```php
php artisan db:seed
```
# Admin Credentials 
```php
user email : admin@admin.com

password : 123456
```
# Api 
# for login


![](docs/Selection_001.png)

URL/api/v1/authenticate

submit a post request with the user email and password

## if email and password is correct it will return a 60 character length string
## and you can use that string on accessing the api resources listed below.
![](docs/Selection_002.png)

## if email and password is incorrent
![](docs/Selection_003.png)

## if invalid token was used
![](docs/Selection_006.png)

## two ways to use token to access resources:
### 1. via headers, Authorization: Bearer 60_length_token_string
![](docs/Selection_005.png)
### 2. via query string, URL/api/v1/galleries?api_token=60_length_token_string
![](docs/Selection_004.png)

# Reset Token

URL/api/v1/reset

## it will return a new token and the old token will be discarded
![](docs/Selection_007.png)

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


to make a product request you need to go 
v1/api/products

if you need to fetch some accurate date 

v1/api/products?from=date&to=date

if you need to fetch only product name 

v1/api/products/from=date&to=date&fetch=product

fetch quantity 

v1/api/products/from=date&to=date&fetch=quantity

fetch all 

v1/api/products/from=date&to=date&fetch=all

or 

v1/api/products/from=date&to=date
