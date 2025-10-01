<?php

namespace App\Livewire\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateTheme
{
    /**
     * Update the current user's theme preference.
     */
    public function __invoke(Request $request)
    {
        $theme = $request->input('theme');
        
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        
        if ($user && in_array($theme, ['dark', 'light'])) {
            $user->update(['theme' => $theme]);
        }
        
        return response()->json(['success' => true, 'theme' => $theme]);
    }
}

