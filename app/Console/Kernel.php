<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
	protected $commands = [
		\App\Console\Commands\Inspire::class,
		\App\Console\Commands\ParseMaildir::class,
		\App\Console\Commands\EmailParse::class,
	];

	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')->hourly();
	}
}
