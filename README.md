
## About This Project 

This is a simple Bus Booking System using laravel 8 & mySQL and API sat up, 
users can book a specific seat for a specific trip and specific route with start & end point.

 


##### Updates 

- Fixing bugs 
- Taking the project into higher level by refactoring the whole project to be using Service Container.




What can admin do ? 

- Add/Edit/Delete stations 
- Add/Edit/Delete routes 
- Add/Edit/Delete trips 
- View/Delete Bookings 

SO basically , we set up stations , and we set up routes by choosing each route start_point ,end_point & the stop points 

- The user can easily lookup for trips by entering the start & end points , after choosing a trip , the user can easily see and choose available seats , 
- The app calculates the price per each chosen seat as well > total price
- The user can also choose their preferred pickup location and drop location 

- Admin can view the booking order (name, booked at, pickup location, drop location, total price)
 
 
 
 TO TEST THIS APP 
 
 Choose Cairo as from & Asyut as to then click Find 
 
 if you would like to test from scratch
 
 - Add stations
 - Add Routes
 - Add Trips 
 
 
 - Search for the trip u added , choose book and choose your pickup & drop location & choose your seats then Click Book
 
 To Access Admin area please go to /admin

  E-mail : admin@mail.com
  
  Pw : momomomo
  
  

 To Access the api > /api 
 
 ##### API ENDPOINTS 

PS: I have disabled the api authorization so it could be easier for testing , if you would like to enable it again please go to 
app/Http/Middleware/VerifyCsrfToken.php and delete 'api/*'
 
 - get available seats 
 X-POST your-domain/api/get_seats
 
 parameters: pickup_point , drop_point
 
 
 - book a seat 
 X-POST your-domain/api/book_trip
 parameters:name,trip(int),pickup_point(int),drop_point(int),seats(string),total_price(double)


#####DATABASE 
 
 - If you would like to use an already done database to test please go to database folder you will find the .sql file  

#####DOCKER 

- For Docker we can use Laravel Sail , a light-weight lib to deal with Laravel docker , but it is not implemented in this project 
