<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\App;
// use App\Todo;
class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Todo::class, 200)->create();
    }
}
