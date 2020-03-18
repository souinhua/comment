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
`git clone git@github.com:souinhua/comment.git comment_project_name`

**Step 2**: Go to project directory and install dependecies through composer
`composer install`

**Step 3**: Create the database manually in your local MySQL. For example:
`CREATE DATABASE comment_db;`

**Step 4**: In the project directory, run the database migration and seeding
`php artisan migrate --seed`

**Step 5**: Install front-end dependencies and compile for development
`npm install && npm run dev`

## Accessing the app
You can use Homestead to setup an environment for this app to run. To learn more, here: https://laravel.com/docs/6.x/homestead

Or, you can setup Laravel Valet in your mac. https://laravel.com/docs/6.x/valet
