<?php

namespace App\Console\Commands;

use App\Models\Hrs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RehashPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passwords:rehash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rehash passwords in the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $hrs = Hrs::all();

        foreach ($hrs as $hr) {
            $hr->hr_password = Hash::make($hr->hr_password);
            $hr->save();
        }

        $this->info('Passwords rehashed successfully!');
    }
}
