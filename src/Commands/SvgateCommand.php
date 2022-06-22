<?php

namespace Uzbek\Svgate\Commands;

use Illuminate\Console\Command;

class SvgateCommand extends Command
{
    public $signature = 'svgate';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
