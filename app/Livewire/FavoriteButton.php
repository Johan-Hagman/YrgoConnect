<?php

namespace App\Livewire;

use App\Models\Favorite;
use App\Models\Student;
use App\Models\Company;
use Livewire\Component;

class FavoriteButton extends Component
{
    public $favoritable;  // Den student eller företag som ska kunna favoritmarkeras
    public $isFavorited = false;

    public function mount($favoritable)
    {
        $this->favoritable = $favoritable;

        // Kontrollera om användaren redan har markerat detta som favorit
        $this->isFavorited = $this->checkIfFavorited();
    }

    public function checkIfFavorited()
    {
        return auth()->user()->favorites()
            ->where('favoritable_id', $this->favoritable->id)
            ->where('favoritable_type', get_class($this->favoritable))
            ->exists();
    }

    public function toggleFavorite()
    {
        // Check if the favoritable item is the current user
        if ($this->favoritable instanceof \App\Models\User && $this->favoritable->id === auth()->id()) {
            // You can handle this case with a flash message or just return
            session()->flash('error', 'You cannot favorite yourself.');
            return;
        }

        // Or if specific to Student model and the student belongs to current user
        if ($this->favoritable instanceof \App\Models\Student && $this->favoritable->user_id === auth()->id()) {
            session()->flash('error', 'You cannot favorite your own profile.');
            return;
        }

        if ($this->isFavorited) {
            // Ta bort favorit
            $this->removeFavorite();
        } else {
            // Lägg till favorit
            $this->addFavorite();
        }

        // Uppdatera fav-statusen
        $this->isFavorited = !$this->isFavorited;
    }

    public function addFavorite()
    {
        Favorite::create([
            'user_id' => auth()->id(),
            'favoritable_id' => $this->favoritable->id,
            'favoritable_type' => get_class($this->favoritable),
        ]);
    }

    public function removeFavorite()
    {
        Favorite::where('user_id', auth()->id())
            ->where('favoritable_id', $this->favoritable->id)
            ->where('favoritable_type', get_class($this->favoritable))
            ->delete();
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
