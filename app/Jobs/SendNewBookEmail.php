<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Books\Book;
use App\User;

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
        $users = \App\User::select(['email','first_name'])->get()->toArray();

        foreach ($users as $user){
            \Mail::later(1,'emails.NewBookEmail',["book"=>$this->BookModel], function ($mailer) use($user){
                $mailer->from('reminder@library.com', 'Librarian');
                $mailer->to($user["email"], $user["first_name"])->subject('New book in library');
            });
        }

    }
}
