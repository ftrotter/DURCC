<?php
/*
	This file is needed because of reasons. 
	When we remove it, things go haywire.. but it does not actually do anything.
	Why cant we remove it more easily?
*/
namespace ftrotter\DURCCC;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
class DURCCCommand extends Command{
    protected $signature = 'DURCC {--squash} {--DB=*}';
    protected $description = 'DURCC reads your DB structure (:mine) and writes corresponding Laravel code (:write)';
    public function handle(){
	//what does this do?
	$databases = $this->option('DB');
	$squash = $this->option('squash');
	//pass these options to to two other commands...
	echo "Running DURCCCommand main command...\n";
	$db_struct = DURCC::getDBStruct($databases);
	var_export($db_struct);
    }
}
