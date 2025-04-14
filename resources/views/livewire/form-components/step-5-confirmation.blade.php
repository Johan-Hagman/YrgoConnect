<div class="flex flex-col justify-start items-center gap-2.5">
    <div class="w-full bg-red rounded-2xl flex flex-col justify-start items-center gap-10 px-4 py-6
                lg:px-[240px] lg:py-20">
  
          
          <img src="{{ asset('icons/registration_gif.gif') }}" alt="Registrering klar" 
               class="w-56 h-56 lg:w-80 lg:h-80" />
  
          <div class="w-full max-w-[892px] flex flex-col justify-start items-start gap-6">
              <h1 class="w-full max-w-[900px] text-white text-3xl font-normal font-sans leading-9 
                         lg:text-6xl lg:font-light lg:leading-[90px]">
                  Registreringen lyckades!
              </h1>
  
              <p class="self-stretch text-white text-xl font-normal font-sans leading-7">
                  Stort lycka till med att hitta dina nya kollegor.
              </p>
          </div>
  
          <div class="self-stretch inline-flex justify-start items-center gap-64">
              <a href="{{ route('dashboard') }}"
                 class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-white flex justify-center items-center gap-2.5">
                  <span class="text-white text-base font-medium font-sans leading-none">
                      @if($role === 'student')
                          Se alla företag
                      @else
                          Se alla studenter
                      @endif
                  </span>
                  <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Pil" class="w-6 h-6">
              </a>
          </div>
      </div>
  </div>