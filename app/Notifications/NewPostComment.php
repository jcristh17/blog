<?php

namespace App\Notifications;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPostComment extends Notification
{
    use Queueable;
    public $post;
    public $Comment;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post,Comments $newComment)
    {
        $this->post=$post;
        $this->Comment=$newComment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    /* public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    } */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            
            'type'=>                ', has commented your post',
            'body'=>                $this->Comment->body,
            'post_id'=>$this->post->id,
            'icon'=>             'fa-regular fa-comment fa-xl',
            'comment_user_name'=>   auth()->user()->name,
        ];
    }
}
