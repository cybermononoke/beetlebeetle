<?php

namespace App\Livewire\Emails;


use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use App\Models\Email;
use Mary\Traits\Toast;
use Exception;

class EmailIndex extends Component
{
    use Toast;
    public string $search = '';
    public bool $drawer = false;
    public bool $myModal1 = false;
    public $emailAuthoring = false;
    public ?Email $selectedEmail = null;
    public string $emailType = 'inbox';
    public array $sortBy = ['column' => 'from', 'direction' => 'desc'];

    public function emails(): Collection
    {
        return Email::query()
            ->when(
                $this->search,
                fn(Builder $query) =>
                $query->where(function ($query) {
                    $query->where('from', 'like', "%{$this->search}%")
                        ->orWhere('subject', 'like', "%{$this->search}%")
                        ->orWhere('content', 'like', "%{$this->search}%")
                        ->orWhere('to', 'like', "%{$this->search}%");
                })
            )
            ->when($this->emailType === 'inbox', fn(Builder $query) => $query->where('deleted', false)->where('folder', '!=', 'junk'))
            ->when($this->emailType === 'junk', fn(Builder $query) => $query->where('folder', 'junk'))
            ->when($this->emailType === 'draft', fn(Builder $query) => $query->where('folder', 'draft'))
            ->when($this->emailType === 'starred', fn(Builder $query) => $query->where('starred', true))
            ->when($this->emailType === 'deleted', fn(Builder $query) => $query->where('deleted', true))
            ->orderBy('created_at', 'desc')
            ->get();
    }


    public function selectEmail($id): void
    {
        $email = Email::findOrFail($id);
        if (!$email) {
            $this->error('Email not found.', position: 'toast-bottom');
            $this->selectedEmail = null;
            return;
        }
        $this->selectedEmail = $email;
        $this->dispatch('email-read', $id);
    }

    public function getEmailTitle(): string
    {
        switch ($this->emailType) {
            case 'inbox':
                return 'Inbox';
            case 'junk':
                return 'Junk';
            case 'draft':
                return 'Drafts';
            case 'starred':
                return 'Starred';
            case 'deleted':
                return 'Trash';
            default:
                return 'Emails';
        }
    }

    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    #[On('email-view-closed')]
    public function closeEmailView()
    {
        $this->selectedEmail = null;
    }

    #[On('email-read')]
    public function readEmail($id)
    {
        $email = Email::findOrFail($id);
        $email->read = true;
        $email->save();
    }

    #[On('readAllEmails')]
    public function readAllEmails(): void
    {
        try {
            Email::where('read', false)->update(['read' => true]);
            $this->success('All emails marked as read.', position: 'toast-bottom');
        } catch (Exception $e) {
            $this->error('Failed to mark emails as read. Please try again.', position: 'toast-bottom');
        }
    }

    #[On('selectCategory')]
    public function selectCategory($category) {
        $this->selectedEmail = null;
        $this->emailType = $category;
    }

    #[On('writeEmail')]
    public function openModal()
    {
        $this->myModal1 = true;
        $this->emailAuthoring = true;
    }


    public function render()
    {
        return view('livewire.emails.email-index', [
            'emails' => $this->emails(),
            'emailTitle' => $this->getEmailTitle(),
            'selectedEmail' => $this->selectedEmail,
        ]);
    }
}