<div>
    <!-- HEADER -->
    <x-header title="{{ $emailTitle }}" separator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
    </x-header>

    <x-modal wire:model="myModal1" class="backdrop-blur" box-class="w-11/12 md:w-3/4 max-w-4xl h-[90vh] overflow-y-auto">
        <livewire:emails.email-authoring />
    </x-modal>

    @if($selectedEmail)
    <livewire:emails.show :email="$selectedEmail" />
    @else
    <!-- LIST -->
    <x-card>
        @foreach($emails as $email)
        <div wire:key="email-{{ $email->id }}">
            <x-list-item :item="$email" wire:click="selectEmail({{ $email->id }})">
                <x-slot:avatar>
                    @if(!$email->read)
                    <x-badge value="New" class="badge-primary" />
                    @elseif($email->starred)
                    <x-icon name="s-star" />
                    @endif
                </x-slot:avatar>
                <x-slot:value>
                    {{ $email->from }}
                </x-slot:value>
                <x-slot:sub-value>
                    {{ $email->subject }}
                </x-slot:sub-value>
                <x-slot:actions>
                    <h1>{{ $email->created_at->format('M d, h:i A') }}</h1>
                </x-slot:actions>
            </x-list-item>
        </div>
        @endforeach
    </x-card>
    @endif
</div>