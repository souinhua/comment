<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeds the first comment
        DB::table('comments')->insert([
            'name' => "Janssen",
            'comment' => "This is the first comment for this app. You can reply to this or make a new thread.",
            'parent_id' => null,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
