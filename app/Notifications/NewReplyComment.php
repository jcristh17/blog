<?php

namespace App\Notifications;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReplyComment extends Notification
{
    use Queueable;

    public $post;
    public $comment;
    public $Reply;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post,Comments $comment, $newReply)
    {
        $this->post=$post;
        $this->comment=$comment;
        $this->Reply=$newReply;
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
            
            'type'=>                ', has replied your comment',
            'body'=>                $this->Reply->body,
            'post_id'=>$this->post->id,
            'icon'=>             'fa-regular fa-comments fa-xl',
            'comment_user_name'=>   auth()->user()->name,
        ];
    }
}
