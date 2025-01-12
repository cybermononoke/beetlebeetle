@php
$categories = [
[
'title' => 'Inbox',
'icon' => 'o-envelope',
'name' => 'inbox'
],
[
'title' => 'Junk',
'icon' => 'o-archive-box-x-mark',
'name' => 'junk'
],
[
'title' => 'Drafts',
'icon' => 'o-paper-clip',
'name' => 'draft'
],
[
'title' => 'Starred',
'icon' => 'o-star',
'name' => 'starred'
],
[
'title' => 'Trash',
'icon' => 'o-trash',
'name' => 'deleted'
],
]
@endphp

<x-menu>
    @foreach ($categories as $category)
    <x-menu-item
        :title="$category['title']"
        :icon="$category['icon']"
        wire:click="$dispatch('selectCategory', { category: '{{ $category['name'] }}' })"
        class="{{ $selectedCategory == $category['name'] ? 'bg-black/10' : '' }}" />
    @endforeach

    {{-- Separator --}}
    <div class="py-2"></div>

    <x-menu-sub title="Actions" icon="o-bolt">
        <x-menu-item title="Read All" icon="o-eye" wire:click="$dispatch('readAllEmails')" />
        <x-menu-item title="New Email" icon="o-pencil-square" wire:click="$dispatch('writeEmail')" />
        <x-menu-item title="Logout" icon="o-arrow-left-end-on-rectangle" link="/logout" />
    </x-menu-sub>

    <x-menu-item title="Center" icon="o-building-office-2" link="/centers/dashboard" />


    <x-menu-item title="Notifications" badge="10" badge-classes="!badge-warning" icon="o-bell" link="/notifications" />


</x-menu>