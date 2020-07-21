# Install packages
* run `npm install` to install packages.

# Database setup
* change `.env.example` to `.env` .
* create a database with the name `todo` and setup your credentials.
* run `php artisan migrate --path='{copy the relative path of the file from the directory public\database\migrations\<somedate>_create_todos_table.php and paste it here}'` to migrate only the todos table.
* running `php artisan migrate` also works but the other tables will not be used except for the todos table.
* run `php artisan db:seed --class=TodoSeeder` to create 200 records of dummy todo.


