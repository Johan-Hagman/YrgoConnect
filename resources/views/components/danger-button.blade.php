@props(['type' => 'submit'])

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'px-6 py-2 rounded-full bg-red text-white text-base font-medium font-sans leading-none hover:bg-red/90 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red'
    ]) }}>
    {{ $slot }}
</button>

