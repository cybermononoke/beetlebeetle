<?php

namespace App\Livewire\Emails;


use Livewire\Component;
use App\Models\Email;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use Exception;

class Show extends Component
{
    use Toast;
    public Email $email;

    public $emailAuthoring = false;
    public $starred = false;

    public function mount($email)
    {
        $this->starred = Email::findOrFail($email->id)->starred;
    }

    #[On('emailAuthoring')]
    public function doesStuff()
    {
        $this->emailAuthoring = !$this->emailAuthoring;
    }

    #[On('email-starred')]
    public function toggleStar($id): void
    {
        try {
            $email = Email::findOrFail($id);

            $email->starred = !$email->starred;
            $this->starred = $email->starred;
            $email->save();

            if ($this->starred) {
                $this->success('Email starred successfully.', position: 'toast-bottom');
            } else {
                $this->success('Favorite removed.', position: 'toast-bottom');
            }
        } catch (Exception $e) {
            $this->error('Failed to star the email. Please try again.', position: 'toast-bottom');
        }
    }

    #[On('email-junked')]
    public function toggleJunk($id): void
    {
        try {
            $email = Email::findOrFail($id);

            $email->folder = 'junk';
            $email->save();
            $this->success('Email junked successfully.', position: 'toast-bottom');
        } catch (Exception $e) {
            $this->error('Failed to junk email. Please try again.', position: 'toast-bottom');
        }
    }

    #[On('email-deleted')]
    public function toggleDelete($id): void
    {
        try {
            $email = Email::findOrFail($id);
            $email->deleted = true;
            $email->save();
            $this->dispatch('email-view-closed');
            $this->success('Email deleted successfully.', position: 'toast-bottom');
        } catch (Exception $e) {
            $this->error('Failed to delete email. Please try again.', position: 'toast-bottom');
        }
    }

    public function render()
    {
        return view('livewire.emails.show');
    }
}
