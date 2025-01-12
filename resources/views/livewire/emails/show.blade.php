<div>
    <x-card>
        <x-button icon="o-x-mark" wire:click="$dispatch('email-view-closed')" class="btn-ghost btn-sm" spinner title="Close" />

        <div class="p-4">
            <x-slot:actions>
                <x-button icon="{{ $starred ? 's-star' : 'o-star' }}" wire:click="$dispatch('email-starred', { id: {{ $email->id }} })" class="btn-ghost btn-sm" spinner title="Star" />
                <x-button icon="o-archive-box-x-mark" wire:click="$dispatch('email-junked', { id: {{ $email->id }} })" class="btn-ghost btn-sm" spinner title="Junk" />
                <x-button icon="o-trash" wire:click="$dispatch('email-deleted', { id: {{ $email->id }} })" class="btn-ghost btn-sm" spinner title="Trash" />
                <x-button icon="{{ $emailAuthoring ? 's-pencil-square' : 'o-pencil-square'}}" wire:click="$dispatch('emailAuthoring')" class="btn-ghost btn-sm" spinner title="Write" />
            </x-slot:actions>

            <h2 class="text-xl font-bold">{{ $email->subject }}</h2>
            <p><strong>From:</strong> {{ $email->from }}</p>
            <p>To: {{ $email->to }} | Sent at: {{ $email->created_at->format('Y-m-d H:i') }}</p>
            <div class="mt-2">{{ $email->content }}</div>
        </div>

        @if($email->image)
        <div class="mt-4">
            <img src="https://picsum.photos/400" />
        </div>
        @endif
    </x-card>

    <div class="py-2"></div>

    @if($emailAuthoring)
    <x-card>
        <livewire:email-authoring />
    </x-card>
    @endif
</div>