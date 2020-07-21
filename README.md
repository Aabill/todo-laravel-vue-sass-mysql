# Install packages
`npm install`

# Database setup
* change `.env.example` to `.env` .
* create a `todo` database name and setup your credentials.
* run `php artisan migrate --path='{copy the relative path of the file public\database\migrations\<somedate>_create_todos_table.php and paste it here}'` to migrate only the todos table
* running `php artisan migrate` also works but the other tables will not be used except for the todos table.
* run `php artisan db:seed --class=TodoSeeder` to create 200 records of dummy todo.


