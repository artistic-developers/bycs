TOOLS:

	=> PHP LARAVEL
	=> MySQL

INTRODUCTION:

	=> Data fetched from NASA API for last 3 days.
	=> Further we have simplified data. Records which hold data for "close_approach_data" are filtered and stored in database.

COMPONENTS:

	=> app\Http\Controllers\ApiController.php
		-> This is the main controller which handles the data and responses back with views

	=> app\Traits
		-> There are two traits (classes) DatabaseHandler.php and RequestHandler.php
		-> To keep the code clean separate classes have been made which process the data and responds back inside controller
		-> DatabaseHandler.php is used to store database in database
		-> RequestHandler.php is used to fetch data from NASA API and process the data further more

	=> resources\views\api
		-> Here lies all the views that shows the relevent data in a proper format

	=> routes\web.php
		-> Here lies all the routes that are used in the application

HOW TO USE:

	1 => Download contents from db
	2 => Run mysql_start.bat
	3 => Install composer (download from here https://getcomposer.org/download/)
	4 => Run cmd.exe
	5 => Enter in the project's directory i.e app
	6 => Run command "php artisan serve"
	7 => Open browser and run "localhost:8000"