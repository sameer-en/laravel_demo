<?php
use App\UserInformation;
use Illuminate\Database\Seeder;
use App\User;

class UsersInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          factory(User::class, 10)->create()->each(function ($u) {
        $u->userInfo()->save(factory(UserInformation::class)->make());
    });

    }
}
