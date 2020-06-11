<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \App\Services\XMLParserService;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $link;
    private $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($link, $userId)
    {
        $this->link = $link;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(XMLParserService $xMLParserService)
    {
        $xMLParserService->saveNews($this->link, $this->userId);
    }
}
