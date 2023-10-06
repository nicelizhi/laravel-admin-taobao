<?php

namespace Nicelizhi\Taobao\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'taobao:publish {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "re-publish taobao's assets, configuration, language and migration files. If you want overwrite the existing files, you can add the `--force` option";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $force = $this->option('force');
        $options = ['--provider' => 'Nicelizhi\Taobao\TaobaoServiceProvider'];
        if ($force == true) {
            $options['--force'] = true;
        }
        $this->call('taobao:vendor:publish', $options);
        $this->call('taobao:view:clear');
    }
}
