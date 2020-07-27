# league

## Installation
### Step 1
Open project 
	
	cd league

### Step 2
Install dependencies

	composer install

### Step 3
Create a .env file from an example and configure with your local database

	cp .env.example .env

```env
.env
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
### Step 4 
Generate key, make migration and seed

	php artisan key:generate
	php artisan migrate
	php artisan db:seed

### Step 5
Serve your project

	php artisan serve
	http://localhost:8000
	
### Step 6
Yay! Everything is OK.

### Error Handling

*Don't forget update your **APP_URL** attribute on **.env** file* 

*Don't forget update your **APP_NAME** attribute on **.env** file* 

*laravel.log could not be opened*
[https://stackoverflow.com/a/23412543](https://stackoverflow.com/a/23412543)

*Specified key was too long error*
[https://laravel-news.com/laravel-5-4-key-too-long-error](https://laravel-news.com/laravel-5-4-key-too-long-error)
