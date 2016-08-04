<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Books\Book;

class SendNewBookEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $BookModel;

    /**
     * Create a new job instance.
     *
     * @param  Book  $book
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->BookModel = $book;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        \Mail::send('emails.NewBookEmail',["book"=>$this->BookModel], function ($mailer){
            $mailer->from('hello@app.com', 'Your Application');
            $mailer->to("mfc2005@ukr.net", "Andrey Smith")->subject('Your Reminder!');
        });

    }
}
