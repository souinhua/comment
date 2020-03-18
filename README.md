# Simple Comment App
A simple nested comment app made with Laravel and Vue Framework. This project uses the following technologies and approach:

##### Back-end
- RESTful API with Resource Controllers
- Eloquent ORM
- Eager Loading Techniques
- Basic Unit Testing
- Database Migration and Seeding

##### Front-end
- General Vue Javascript Framework
- Recursive Components
- API Consumption with Axios
- Laravel Mix

## How to Setup

**Step 1**: Clone this repository
<pre>git clone git@github.com:souinhua/comment.git comment_project_name</pre>

**Step 2**: Go to project directory and install dependecies through composer
<pre>composer install</pre>

**Step 3**: Create the database manually in your local MySQL. For example:
<pre>CREATE DATABASE comment_db;</pre>

**Step 3**: Configure your `.env` file database connection
<pre>
DB_DATABASE=comment_db
DB_USERNAME=username_example
DB_PASSWORD=secret
</pre>

**Step 5**: In the project directory, run the database migration and seeding
<pre>php artisan migrate --seed</pre>

**Step 6**: Install front-end dependencies and compile for development
<pre>npm install && npm run dev</pre>

**Step 7**: Run backend test
<pre>phpunit</pre>

## Accessing the app
You can use Homestead to setup an environment for this app to run. To learn more, here: https://laravel.com/docs/6.x/homestead

Or, you can setup Laravel Valet in your mac. https://laravel.com/docs/6.x/valet
