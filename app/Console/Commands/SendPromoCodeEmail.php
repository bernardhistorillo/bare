<?php

namespace App\Console\Commands;

use App\Mail\FutureTech;
use App\Mail\PromoCode;
use App\Mail\PulseReminder;
use App\Models\EmailSubscription;
use App\Models\WorkshopRegistrant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Output\ConsoleOutput;

class SendPromoCodeEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bare:sendpromocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $out = new ConsoleOutput();

        $emailSubscriptions = EmailSubscription::all();

        foreach($emailSubscriptions as $emailSubscription) {
            $out->writeln($emailSubscription['email']);

            Mail::to($emailSubscription['email'])
                ->queue(new PromoCode($emailSubscription));
        }

        return 0;
    }
}
