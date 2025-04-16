<button wire:click="toggleFavorite" class="focus:outline-none">
    @if($isFavorited)
        <!-- Filled Star SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
            <path d="M36.0547 11.0782C35.5311 9.8658 34.7761 8.76717 33.832 7.84378C32.8872 6.91763 31.7733 6.18163 30.5508 5.67581C29.2831 5.14922 27.9235 4.87968 26.5508 4.88284C24.625 4.88284 22.7461 5.41018 21.1133 6.40628C20.7227 6.64456 20.3516 6.90628 20 7.19143C19.6484 6.90628 19.2773 6.64456 18.8867 6.40628C17.2539 5.41018 15.375 4.88284 13.4492 4.88284C12.0625 4.88284 10.7187 5.14847 9.44922 5.67581C8.22266 6.18362 7.11719 6.91409 6.16797 7.84378C5.22264 8.76613 4.46749 9.86502 3.94531 11.0782C3.40234 12.3399 3.125 13.6797 3.125 15.0586C3.125 16.3594 3.39063 17.7149 3.91797 19.0938C4.35938 20.2461 4.99219 21.4414 5.80078 22.6485C7.08203 24.5586 8.84375 26.5508 11.0312 28.5703C14.6562 31.918 18.2461 34.2305 18.3984 34.3242L19.3242 34.918C19.7344 35.1797 20.2617 35.1797 20.6719 34.918L21.5977 34.3242C21.75 34.2266 25.3359 31.918 28.9648 28.5703C31.1523 26.5508 32.9141 24.5586 34.1953 22.6485C35.0039 21.4414 35.6406 20.2461 36.0781 19.0938C36.6055 17.7149 36.8711 16.3594 36.8711 15.0586C36.875 13.6797 36.5977 12.3399 36.0547 11.0782Z" fill="white"/>
          </svg>
    @else
        <!-- Outline Star SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
            <path d="M36.0547 11.0782C35.5311 9.8658 34.7761 8.76717 33.832 7.84378C32.8872 6.91763 31.7733 6.18163 30.5508 5.67581C29.2831 5.14922 27.9235 4.87968 26.5508 4.88284C24.625 4.88284 22.7461 5.41018 21.1133 6.40628C20.7227 6.64456 20.3516 6.90628 20 7.19143C19.6484 6.90628 19.2773 6.64456 18.8867 6.40628C17.2539 5.41018 15.375 4.88284 13.4492 4.88284C12.0625 4.88284 10.7188 5.14847 9.44922 5.67581C8.22266 6.18362 7.11719 6.91409 6.16797 7.84378C5.22264 8.76613 4.46749 9.86501 3.94531 11.0782C3.40234 12.3399 3.125 13.6797 3.125 15.0586C3.125 16.3594 3.39063 17.7149 3.91797 19.0938C4.35938 20.2461 4.99219 21.4414 5.80078 22.6485C7.08203 24.5586 8.84375 26.5508 11.0312 28.5703C14.6562 31.918 18.2461 34.2305 18.3984 34.3242L19.3242 34.918C19.7344 35.1797 20.2617 35.1797 20.6719 34.918L21.5977 34.3242C21.75 34.2266 25.3359 31.918 28.9648 28.5703C31.1523 26.5508 32.9141 24.5586 34.1953 22.6485C35.0039 21.4414 35.6406 20.2461 36.0781 19.0938C36.6055 17.7149 36.8711 16.3594 36.8711 15.0586C36.875 13.6797 36.5977 12.3399 36.0547 11.0782ZM20 31.8281C20 31.8281 6.09375 22.918 6.09375 15.0586C6.09375 11.0782 9.38672 7.85159 13.4492 7.85159C16.3047 7.85159 18.7813 9.44534 20 11.7735C21.2188 9.44534 23.6953 7.85159 26.5508 7.85159C30.6133 7.85159 33.9063 11.0782 33.9063 15.0586C33.9063 22.918 20 31.8281 20 31.8281Z" fill="white"/>
          </svg>
    @endif
</button>