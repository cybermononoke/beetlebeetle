<div class="flex flex-col gap-4">
    <div>
        <x-input label="To" wire:model="to" placeholder="Recipient's email" clearable />
    </div>

    <div>
        <x-input label="Subject" wire:model="subject" placeholder="Email subject" clearable />
    </div>

    <div>
        <x-input label="Cc" wire:model="cc" placeholder="CC" clearable />
    </div>

    <div>
        <x-textarea wire:model="content" placeholder="Your story ..." hint="Max 1000 chars" rows="5" inline />
    </div>

    <div class="pt-8">
        <x-button wire:click="sendEmail" label="Send Email" class="btn-primary" />
    </div>
</div>