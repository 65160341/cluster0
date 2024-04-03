<?php
namespace App\Console\Commands;

use App\Models\Hrs;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Hash;

class RehashPasswords extends Command
{
    protected $signature = 'passwords:rehash';

    protected $description = 'Rehash all existing passwords using bcrypt';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $hrs = Hrs::all();

        foreach ($hrs as $hr) {
            $hr->password = Hash::make($hr->password);
            $hr->save();
        }

        $this->info('Passwords rehashed successfully.');
    }
}
?>
