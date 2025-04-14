<!-- Yttre wrapper -->
<div class="w-full px-4 sm:px-6 lg:px-0">
    <!-- Centrerad container som hanterar allt -->
    <div class="container mx-auto">
        <!-- Innehåll -->
        <div data-property-1="When-Where"
            class="w-full py-10 flex flex-col justify-start items-center gap-10
                   xl:flex-row xl:justify-start xl:items-start xl:gap-20 xl:pt-40 xl:pb-28">

            <!-- Event image -->
            <img class="w-full max-w-md h-96 rounded-2xl object-cover
                        xl:w-[530px] xl:h-[530px] xl:max-w-none"
                src="{{ asset('icons/event-image.png') }}"
                alt="Event image">

            <!-- Event info -->
            <div class="w-full max-w-md px-8 flex flex-col justify-start items-center gap-6
                        xl:flex-1 xl:items-start xl:h-[598px] xl:px-0">

                <!-- Section title -->
                <div class="w-full text-red text-2xl font-semibold font-sans uppercase leading-9 xl:text-3xl xl:leading-10">
                    Information om eventet
                </div>

                <!-- Date + location -->
                <div class="w-full px-4 rounded-2xl inline-flex justify-start items-start gap-6
                            xl:max-w-[643px] xl:w-full xl:px-6 xl:gap-24">
                    <!-- Date -->
                    <div class="inline-flex flex-col justify-center items-center xl:items-start">
                        <div class="text-red text-xl font-bold font-sans leading-loose xl:text-2xl">April</div>
                        <div class="text-red text-8xl font-bold font-sans uppercase leading-[102px]">23</div>
                        <div class="text-red text-base font-normal font-sans leading-snug xl:text-xl xl:leading-7">13.00–16.00</div>
                    </div>

                    <!-- Divider -->
                    <div class="h-40 w-0 outline outline-2 outline-offset-[-1px] outline-red"></div>

                    <!-- Location -->
                    <div class="inline-flex flex-col justify-start items-start gap-2">
                        <div class="text-red text-xl font-bold font-sans leading-relaxed xl:text-2xl xl:leading-loose">Visual Arena</div>
                        <div class="text-red text-base font-normal font-sans leading-snug xl:text-xl xl:leading-7">
                            Lindholmspiren 3<br/>Göteborg
                        </div>
                    </div>
                </div>

                <!-- Text -->
                <div class="w-full max-w-[600px] flex flex-col justify-start items-start gap-4 xl:max-w-[575px]">
                    <p class="text-black text-base font-normal font-sans leading-snug xl:text-xl xl:leading-7">
                        Letar du efter framtida medarbetare eller en driven LIA-student? Då är du välkommen till vårt mingelevent på Yrgo, där du får möjlighet att träffa engagerade studenter inom Digital Design och Webbutveckling.
                    </p>
                    <p class="text-black text-base font-normal font-sans leading-snug xl:text-xl xl:leading-7">
                        Studenterna kommer visa upp sina projekt från året, och ni som företag får en unik chans att nätverka och träffa framtida talanger.
                    </p>
                    <p class="text-black text-base font-normal font-sans leading-snug xl:text-xl xl:leading-7">
                        Varmt välkomna önskar studenterna i Digital Design och Webbutveckling!
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
