<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\JemaatService;

class UpdateJemaatStatusAnnual extends Command
{
    protected $signature = 'jemaat:update-status-annual';
    protected $description = 'Melakukan pembaruan status jemaat secara tahunan';

    public function handle(JemaatService $jemaatService)
    {
        $this->info('Memulai proses pembaruan status jemaat tahunan...');
        $count = $jemaatService->performAnnualStatusUpdate();
        $this->info("Berhasil memproses {$count} data jemaat.");
    }
}
