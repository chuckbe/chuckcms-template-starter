<?php

namespace Chuckbe\ChuckcmsTemplateStarter\Commands;

use Chuckbe\ChuckcmsTemplateNairobi\seeds\ChuckcmsTemplateStarterTableSeeder;
use Illuminate\Console\Command;

class PublishStarter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chuckcms-template-starter:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command publishes the Starter template for ChuckCMS.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $seeder = new ChuckcmsTemplateStarterTableSeeder();
        $seeder->run();
        
        $this->info('Validating your information and generating a new site...');

        $this->info('.         .');
        $this->info('..         ..');
        $this->info('...         ...');
        $this->info('.... NAIROBI ....');
        $this->info('...         ...');
        $this->info('..         ..');
        $this->info('.         .');
        $this->info('.         .');
        $this->info('..         ..');
        $this->info('...         ...');
        $this->info('....   NOW   ....');
        $this->info('...         ...');
        $this->info('..         ..');
        $this->info('.         .');
        $this->info(' ');
        $this->info('ChuckCMS Template Starter published successfully');
        $this->info(' ');
        

        
    }
}
