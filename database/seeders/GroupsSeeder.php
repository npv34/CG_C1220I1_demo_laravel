<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group();
        $group->name = 'C1220I1';
        $group->save();

        $group = new Group();
        $group->name = 'C0920I1';
        $group->save();

        $group = new Group();
        $group->name = 'C0820I1';
        $group->save();
    }
}
