<?php

namespace App\Livewire\Emails;



use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Email;
use Illuminate\Support\Facades\Auth;
use Mary\Traits\Toast;

class EmailAuthoring extends Component
{
    use Toast;

    public $to, $subject, $content;
    public $emailAuthoring = false;


    #[On('emailAuthoring')]
    public function doesStuff()
    {
        $this->emailAuthoring = !$this->emailAuthoring;
    }

    #[On('send-email')]
    public function sendEmail()
    {
        $this->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Email::create([
            'to' => $this->to,
            'from' => "test",
            'subject' => $this->subject,
            'content' => $this->content,
            'folder' => 'inbox'
        ]);
        $this->reset(['to', 'subject', 'content']);
        $this->redirect('/emails');
        $this->success('Email sent!', position: 'toast-bottom');
    }



    public function render()
    {
        return view('livewire.emails.email-authoring');
    }
}
