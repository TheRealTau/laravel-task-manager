# laravel-task-manager
Larevel app created for education purposes (under development)

Task manager app.

Made on:
- Laravel 7
- Materialize 1.0.0

Requires:
- Preexisting empty database, remember to set your .env file with the DB info
- SQL service running

Steps to local deployment:

1. Clone the repo
2. Inside the ./taskmanager/ run npm i
3. run php artisan migrate
4. run php db:seed (optional) to create default random registers on user and task table
5. run php artisan serve to start your local server
6. go to http://127.0.0.1:8000 to test the app
