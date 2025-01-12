<div>
    <x-header title="Centers" subtitle="Manage centers here" separator />

    @foreach($centers as $center)
    <x-list-item :item="$center">
        @if(!$center->read_at)
        <x-slot:avatar>
        </x-slot:avatar>
        @endif
        <x-slot:value>
            {{ $center->name ?? 'N/A' }}<br>
            {{ $center->address ?? 'N/A' }}
        </x-slot:value>
        <x-slot:sub-value>
            <p>Type: {{ $center->office_type ?? 'N/A' }}</p>
            <p>Available: {{ $center->is_available ? 'Yes' : 'No' }}</p>
        </x-slot:sub-value>

        <x-slot:actions>
        </x-slot:actions>
    </x-list-item>
    @endforeach
</div>