<section class="w-full px-4 pt-4 pb-20 bg-red flex flex-col lg:flex-row-reverse justify-between items-center gap-10 overflow-hidden lg:px-20 lg:pt-28 lg:pb-0">

    <!-- Hero-cardsection -->
   <div class="w-full sm:px-20 flex justify-center items-center gap-5 overflow-hidden lg:w-[900px] lg:h-[900px] lg:flex-col">

        <video autoplay muted loop playsinline>
            <source src="{{ asset('icons/hero-animation.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
    </div>

    <!-- Text + button -->
    <div class="flex flex-col items-start gap-6 max-w-md lg:max-w-[700px] lg:w-1/2">

        <!-- Headline -->
        <h1 class="text-3xl text-white uppercase font-sans leading-9 lg:text-8xl lg:leading-[102px]">
            <span class="font-semibold">Hitta </span>
            <span class="font-light">dina <br class="lg:hidden" />nya </span>
            <span class="font-semibold">kollegor!</span>
        </h1>

        <!-- Paragraph -->
        <p class="text-white text-body font-regular font-sans leading-7 lg:text-xl">
            Välkomna på mingelevent 23 april för att hitta framtida medarbetare.
        </p>

       <!-- Scroll-knapp -->
       <div
       onclick="document.getElementById('{{ auth()->check() ? 'Grid' : 'registerForm' }}').scrollIntoView({ behavior: 'smooth' })"
       class="cursor-pointer p-4 bg-blue rounded-[40px] inline-flex justify-center items-center gap-2.5"
   >
       <span class="text-white text-button font-medium font-sans leading-none">
           @auth
               @if(auth()->user()->role->name === 'Student')
                   Se Företag
               @elseif(auth()->user()->role->name === 'Företag')
                   Se Studenter
               @else
                   Se deltagare
               @endif
           @else
               Ja, jag vill delta!
           @endauth
       </span>
       <img src="{{ asset('icons/Arrow-Down.svg') }}" alt="Pil" class="w-6 h-6" />
   </div>
   

    </div>

</section>



  