<section class="w-full px-4 pt-4 pb-20 bg-red flex flex-col items-center gap-10 overflow-hidden">

    <!-- Hero-cardsection -->
    <div class="w-full max-w-[384px] h-[510px] sm:px-20 flex justify-center items-center gap-5 overflow-hidden">
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
    <div class="w-full bg-red rounded-bl-2xl flex justify-start items-end px-4 sm:px-20">
        <div class="flex flex-col items-start gap-6 max-w-md">

            <!-- Headline -->
            <h1 class="text-3xl text-white uppercase font-sans leading-9">
                <span class="font-semibold">Hitta </span>
                <span class="font-light">dina <br />nya </span>
                <span class="font-semibold">kollegor!</span>
            </h1>
            

            <!-- Paragraph -->
            <p class="text-white text-body font-regular font-sans leading-7">
                Välkomna på mingelevent 23 april för att hitta framtida medarbetare.
            </p>

            <!-- button -->
            <div class="p-4 bg-blue rounded-[40px] inline-flex justify-center items-center gap-2.5">
                <span class="text-white text-button font-medium font-sans leading-none">
                    Ja, jag vill delta!
                </span>
                <img src="{{ asset('icons/Group.svg') }}" alt="Pil" class="w-6 h-6" />
            </div>

        </div>
    </div>

</section>


  
  