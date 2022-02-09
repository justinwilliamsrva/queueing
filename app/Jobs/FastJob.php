<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FastJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {

        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Filesystem $file)
    {
// throw new \Exception("Failed");
        $file->put(public_path('testing.txt'),'Running with ' . $this->user->name);
        logger('Running with ' . $this->user->name);
    }
    public function tags(){
return ['accounts'];

    }
}
