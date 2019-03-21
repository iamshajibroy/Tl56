<?php

use Illuminate\Database\Seeder;

class AdminUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\AdminUser::class)->create();
    }
}
