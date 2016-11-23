<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
                'division_name' => 'Business Division',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1'
            ]);

        DB::table('divisions')->insert([
                'division_name' => 'HR & GA Division',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1'
            ]);

        DB::table('divisions')->insert([
                'division_name' => 'Media Services Devision',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1'
        ]);

        DB::table('divisions')->insert([
                'division_name' => 'Publishing General Interest Media Division',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1'
        ]);

        DB::table('divisions')->insert([
                'division_name' => 'Publishing Special Interest Media Division',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1'
        ]);

        DB::table('divisions')->insert([
                'division_name' => 'Publishing Women & Children Media Division 	',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1'
        ]);

        DB::table('divisions')->insert([
                'division_name' => 'Strategic Management Office Division',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1'
        ]);
    }
}
