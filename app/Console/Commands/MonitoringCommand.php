<?php namespace App\Console\Commands;

use App\Monitoring;
use App\Site;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MonitoringCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'monitoring';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Check site status';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$sites = Site::all();
		foreach($sites as $site){
			$monitoring = new Monitoring();
			$monitoring->url = $site->url;
			$monitoring->user_id = $site->user_id;
			if($handler = @fopen($site->url,'r')){
				$monitoring->status = 1;
			}else{
				$monitoring->status = 0;
			}
			@fclose($handler);
			$monitoring->save();
		}
	}
}
