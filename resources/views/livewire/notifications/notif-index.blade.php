<div>
    <h2>Notifications</h2>

    @foreach($notifications as $notification)
        @php
            $readAt = $notification->read_at;
        @endphp

        <x-list-item :item="$notification" wire:click="markAsRead('{{ $notification->id }}')">
            @if(is_null($readAt))
                <x-slot:avatar>
                    <x-badge value="New" class="badge-primary" />
                </x-slot:avatar>
            @else

            <!-- this will always display, because the notifs have a read_at value even before the user sees them -->
                <x-slot:avatar>
                    <x-badge value="Read" class="badge-secondary" />
                </x-slot:avatar>
            @endif
            <x-slot:value>
                {{ $notification->center['name'] ?? 'N/A' }}
                {{ $notification->center['address'] ?? 'N/A' }}
            </x-slot:value>
            <x-slot:sub-value>
                Client: {{ $notification->client['name'] ?? 'N/A' }}
            </x-slot:sub-value>

            <x-slot:actions>
                <x-button icon="o-trash" wire:click="deleteNotification('{{ $notification->id }}')" spinner />
            </x-slot:actions>
        </x-list-item>
    @endforeach
</div>
