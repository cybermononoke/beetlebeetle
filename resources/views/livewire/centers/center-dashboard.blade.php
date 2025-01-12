<div>
    <x-header title="Centers" subtitle="This is the management page for fancy shmancy center admins" separator />

    <div class="centers-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
        @foreach($centers as $center)
            <x-card title="{{ $center->name }}" subtitle="{{ $center->address }}" shadow separator>
                
                <h4>Clients:</h4>
                <ul>
                    @forelse($center->clients as $client)
                        <li>{{ $client->name }} ({{ $client->email }})</li>
                    @empty
                        <li>No clients available</li>
                    @endforelse
                </ul>
                
                <x-slot:actions>
                    <x-button label="View Details" class="btn-primary" wire:click="hi" wire:confirm="No details to view atm!" />
                </x-slot:actions>
            </x-card>
        @endforeach
    </div>
</div>
