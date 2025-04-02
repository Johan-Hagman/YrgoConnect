@props([
    'initials',
    'name',
    'title',
    'link',
    'description',
    'size' => 'large' //default
])

@php
    $isSmall = $size === 'small';

    $wrapperClasses = $isSmall
        ? 'w-48 p-5 gap-3'
        : 'w-56 p-6 gap-3.5';

    $logoWrapperHeight = $isSmall ? 'h-36' : 'h-44';
    $logoFontSize = $isSmall ? 'text-5xl leading-[50.48px]' : 'text-8xl leading-[102px]';
    $nameTextSize = $isSmall ? 'text-[9.9px] leading-3' : 'text-xl leading-7';
    $titleTextSize = $isSmall ? 'text-[7.92px] leading-3' : 'text-base leading-snug';
    $linkTextSize = $titleTextSize;
    $descTextSize = $titleTextSize;
@endphp

<div class="bg-blue rounded-lg inline-flex flex-col justify-center items-center {{ $wrapperClasses }}">
    <!-- Logo -->
    <div class="self-stretch {{ $logoWrapperHeight }} flex flex-col justify-start items-start gap-1.5">
        <div class="self-stretch flex-1 p-3.5 bg-white rounded-lg flex flex-col justify-center items-center gap-1.5">
            <div class="self-stretch flex-1 text-center justify-center text-blue {{ $logoFontSize }} font-extralight uppercase font-sans">
                {{ $initials }}
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="self-stretch flex flex-col justify-start items-start {{ $isSmall ? 'gap-2' : 'gap-2.5' }}">
        <div class="self-stretch flex flex-col justify-start items-start gap-1">
            <!-- Namn + heart -->
            <div class="self-stretch inline-flex justify-between items-center">
                <div class="text-grey-10 {{ $nameTextSize }} font-semibold font-sans">
                    {{ $name }}
                </div>
                <div class="w-4 h-4 relative">
                    <img src="{{ asset('/icons/icon-heart.svg') }}" alt="Hjärta" class="w-full h-full" />
                </div>
            </div>

            <!-- Title -->
            <div class="text-grey-10 {{ $titleTextSize }} font-extrabold font-sans">
                {{ $title }}
            </div>

            <!-- Portfolio -->
            <div class="text-grey-10 {{ $linkTextSize }} font-medium underline font-sans">
                <a href="{{ $link }}" target="_blank">Länk till portfolio</a>
            </div>
        </div>

        <!-- Description -->
        <div class="self-stretch flex flex-col justify-start items-start {{ $isSmall ? 'gap-4' : 'gap-5' }}">
            <div class="text-grey-10 {{ $descTextSize }} font-normal font-sans">
                {{ $description }}
            </div>
        </div>
    </div>
</div>

