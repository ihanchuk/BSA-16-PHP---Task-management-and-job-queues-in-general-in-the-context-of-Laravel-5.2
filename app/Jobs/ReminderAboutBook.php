<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Models\Books\Book;

class ReminderAboutBook extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $user;
    protected $book;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @param  Book  $book
     * @return void
     */
    public function __construct(User $user, Book $book)
    {
        $this->user = $user;
        $this->book = $book;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $book = $this->book;
        if ($this->user->ownsBook($this->book->id)){
            \Mail::later(1,'emails.BookReturnReminder',["user"=>$user,"book"=>$book], function ($mailer) use($user,$book){
                $mailer->from('reminder@library.com', 'Angry Librarian!!!');
                $mailer->to($user->email,$user->first_name)->subject('Book not in library');
            });
        }
    }
}
