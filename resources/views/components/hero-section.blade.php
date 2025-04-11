<section class="w-full px-4 pt-4 pb-20 bg-red flex flex-col lg:flex-row-reverse justify-between items-center gap-10 overflow-hidden lg:px-20 lg:pt-28 lg:pb-0">

    <!-- Hero-cardsection -->
    <div class="w-full max-w-[384px] h-[510px] sm:px-20 flex justify-center items-center gap-5 overflow-hidden lg:w-[720px] lg:h-[760px] lg:px-40 lg:flex-col">
        <x-student-card
            initials="F E"
            name="Förnamn Efternamn"
            title="Digital Designer"
            link="#"
            description="Yrgo, högre yrkesutbildning Göteborg, är en del av utbildningsförvaltningen i Göteborgs Stad och har ett av Sveriges bredaste utbud."
            size="small"
        />

        <x-student-card
            initials="F E"
            name="Förnamn Efternamn"
            title="Webbutvecklare"
            link="#"
            description="Vill du ha någon som kan HTML, CSS, JS och Laravel?"
            size="large"
        />
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

        <!-- button -->
        <div class="p-4 bg-blue rounded-[40px] inline-flex justify-center items-center gap-2.5">
            <span class="text-white text-button font-medium font-sans leading-none">
                Ja, jag vill delta!
            </span>
            <img src="{{ asset('icons/Arrow-Down.svg') }}" alt="Pil" class="w-6 h-6" />
        </div>

    </div>

</section>



  