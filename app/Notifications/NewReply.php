<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReply extends Notification
{
    use Queueable;
    public $reply;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reply)
    {
        $this->reply = $reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $user = User::find($this->reply->user_id);
        $discussion = Discussion::find($this->reply->discussion_id);
        return [
            'name'=>$user->name,
            'email'=>$user->email,
            'message'=>$user->name.' replied to the topic '.$discussion->title,
            'type'=>3
        ];
    }
}
