<?php

namespace LaravelEnso\Roles\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use LaravelEnso\Roles\Services\Sync as Service;

class Sync extends Command
{
    protected $signature = 'enso:roles:sync';

    protected $description = 'Sync roles between dev and live environments';

    public function handle(Service $service): void
    {
        if (! File::isDirectory(config_path('local/roles'))) {
            $this->warn('No action will be made due to missing the "roles" directory & files');

            return;
        }

        $service->handle();

        $this->info('Roles were successfully synced');
    }
}
