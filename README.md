
## About This Project 

This is a Bus Booking System using laravel 8 & mySQL and API sat up, 
users can book a specific seat for a specific trip and specific route with start & end point.

 


##### Features 

- User authentication
- Stations are added as Cities 
- Multiple trips between two stations or cities
- 12 seat for each bus as each trip has a bus
- You can book a seat for a specific route if the seat is available
- You can retrieve all available seats to be booked 
- App handles race condition using database transactions

 

##Usage/Install

 ```
  
 add mysql credentials to .env
 ```
````
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
$ php artisan passport:install
$ php artisan serve
```` 

####For Testing 

```
$ php artisan test
```

##usage - Auth
```http
X-POST /api/register

X-POST /api/login
```
| Parameters |  |  |
| :--- | :--- | :--- |
| `email` | `string` | `required` | 
| `password` | `string` | `required` |

```
{
 "message" : ""
  "token" : "TOKEN"
}
```



####Available Seats:
```http
x-POST /api/get_seats
```
| Parameter |  |  |
| :--- | :--- | :--- |
| `trip_id` | `int` |  `required`|
| `pickup_point` | `int` | `required` |
| `drop_point` | `int` | `required` |

 
 
 
####Book Seat:
```
POST /api/book_seat
```
- This Route is guarded by Passport and requires `Authorization: Bearer TOKEN`

| Parameters |  |  |
| :--- | :--- | :--- |
| `trip_id` | `integer` | `required` |
| `seat_id` | `integer` | `required` |
| `pickup_point` | `integer` | `required` |
| `drop_point` | `integer` | `required` |
