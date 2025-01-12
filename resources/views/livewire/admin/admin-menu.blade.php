@php
$categories = [
[
'title' => 'Centers',
'icon' => 'o-building-office-2',
'name' => 'centers'
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
        <x-menu-item title="Add Center" icon="o-building-library" wire:click="" />
        <x-menu-item title="Logout" icon="o-arrow-left-end-on-rectangle" link="/logout" />
    </x-menu-sub>


    <x-menu-item title="Back to Inbox" icon="o-inbox" link="/emails" />

</x-menu>