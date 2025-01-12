<?php

namespace App\Livewire\Centers;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;


#[Layout('components.layouts.base')]
#[Title('Centers Login')]
class CenterLogin extends Component
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function login()
    {
        $credentials = $this->validate();

        // insetad of auth, use Centers middleware
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('/centers/dashboard');
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }


    public function render()
    {
        return view('livewire.centers.center-login');
    }
}
