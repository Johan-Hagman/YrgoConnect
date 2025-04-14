<div>
    <button wire:click="toggleFavorite" class="btn {{ $isFavorited ? 'btn-danger' : 'btn-outline-primary' }}">
        {{ $isFavorited ? 'Remove from Favorites' : 'Add to Favorites' }}
    </button>
</div>
