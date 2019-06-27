<?php

namespace Therour\SbAdmin2\Commands;

use Illuminate\Console\Command;

class PublishAssetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sb-admin:install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy assets from package\'s "public" to app\'s "public/sb-admin-2" directory';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (file_exists(public_path('sb-admin-2'))) {
            return $this->error('The "public/sb-admin-2" directory already exists.');
        }
        /** @var \Illuminate\Filesystem\Filesystem $filesystem */
        $filesystem = $this->laravel->make('files');
        $filesystem->copyDirectory(
            __DIR__.'/../../public',
            public_path('sb-admin-2')
        );
        
        $this->info('The sb-admin-2 asset\'s directory has been copied.');
    }
}
