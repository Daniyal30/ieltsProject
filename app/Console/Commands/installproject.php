<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('installproject')]
#[Description('Command description')]
class installproject extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('config:clear');
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }
}
