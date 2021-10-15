First start:

- docker-compose build
- docker-compose up

Copy .env.example in .env

In backend terminal:

- composer install
- php artisan migrate
- php artisan db:seed

Data collection starts at 10:00 every day.

Get course
POST http://localhost/api/course/

form-data 

currency:USD

date:14-10-2021

api_token:

