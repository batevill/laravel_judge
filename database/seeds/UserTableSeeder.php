<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create positions
        $positionsData = [
            ['name' => 'Ma’ruzachi va rais'],
            ['name' => 'Rais'],
            ['name' => 'Ma’ruzachi'],
            ['name' => '3-sudya'],
            ['name' => 'Yakka tarkibdagi suday'],
        ];

        // Use a loop to create positions
        foreach ($positionsData as $positionData) {
            App\Positions::create($positionData);
        }

        // Create a user with a specific position
        $userData = [
            'name' => 'Dasturchi Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti vitae cupiditate explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe non eligendi possimus autem repellendus nesciunt, est deleniti libero recusandae officiis. Voluptatibus quisquam voluptatum expedita recusandae architecto quibusdam.',
        ];

        // Get the first position created
        $position = App\Positions::first();

        // Add position_id to user data
        $userData['position_id'] = $position->id;

        // Create the user
        App\User::create($userData);
    }
}
