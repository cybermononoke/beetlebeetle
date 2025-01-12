<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppBrand extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
                <a href="/emails" wire:navigate>
                    <!-- Hidden when collapsed -->
                    <div {{ $attributes->class(["hidden-when-collapsed"]) }}>
                        <div class="flex items-center gap-2">
                            <x-icon name="o-envelope-open" class="w-6 -mb-1 text-avo-blue" />
                            <span class="font-bold text-3xl me-3 bg-gradient-to-r from-avo-blue to-avo-yellow bg-clip-text text-transparent">
                                dlvrd
                            </span>
                        </div>
                    </div>

                    <!-- Display when collapsed -->
                    <div class="display-when-collapsed hidden mx-5 mt-4 lg:mb-6 h-[28px]">
                        <x-icon name="o-envelope" class="w-6 -mb-1 text-avo-blue" />
                    </div>
                </a>
            HTML;
    }
}
