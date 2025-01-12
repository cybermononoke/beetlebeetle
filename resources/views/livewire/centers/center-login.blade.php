<div>

@php
$centers =[
    [
        'name' => 'Center 1'
    ],
    [
        'name' => 'Center 2'
    ],
    [
        'name' => 'Center 3'
    ],
]
@endphp
    <div class="md:w-96 mx-auto mt-20">
        <p>Please login with your center credentials</p>
        <div class="mb-10">Cool image here</div>

        <x-form wire:submit="login">
            <x-select label="Center" icon="o-user" :options="$centers" />
            <x-input label="E-mail" wire:model="email" icon="o-envelope" inline />
            <x-input label="Password" wire:model="password" type="password" icon="o-key" inline />

            <x-slot:actions>
                <x-button label="Login" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
            </x-slot:actions>
        </x-form>
    </div>
</div>