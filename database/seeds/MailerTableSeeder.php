<?php

use App\Models\Mail;
use Illuminate\Database\Seeder;

class MailerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mail::create(['user_id' => 1,
                'address' => 'test@test.com',
                'title'   => 'Test email',
                'body'    => 'Body of test email'
        ]);
        Mail::create(['user_id' => 1,
            'address' => 'test@test.com',
            'title'   => 'Test email 1',
            'body'    => 'Body of test email'
        ]);
        Mail::create(['user_id' => 1,
            'address' => 'test@test.com',
            'title'   => 'Test email 2',
            'body'    => 'Body of test email'
        ]);
        Mail::create(['user_id' => 1,
            'address' => 'test@test.com',
            'title'   => 'Test email 3',
            'body'    => 'Body of test email'
        ]);
    }
}
