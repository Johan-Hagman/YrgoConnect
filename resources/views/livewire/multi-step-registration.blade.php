<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="px-4 py-6 flex flex-col items-center gap-6 lg:px-20 lg:py-20">
        @csrf
        
        @if($step === 1)
        @include('livewire.form-components.step-1-user')
    @endif
    
    @if($step === 2 && $role === 'company')
        @include('livewire.form-components.step-2-company')
    @endif
    
    @if($step === 2 && $role === 'student')
        @include('livewire.form-components.step-2-student')
    @endif
    
    @if($step === 3 && $role === 'company')
        @include('livewire.form-components.step-3-company')
    @endif
    
    @if($step === 3 && $role === 'student')
        @include('livewire.form-components.step-3-student')
    @endif
    
    @if($step === 4)
        @include('livewire.form-components.step-4-review')
    @endif
    
    @if($step === 5)
        @include('livewire.form-components.step-5-confirmation')
    @endif
    
    </form>
</div>
