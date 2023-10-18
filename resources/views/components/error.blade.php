<div x-data="{ showMessage: true }" x-show="showMessage" class="fixed flex justify-center top-[108px] right-[28px]">
    @if (session()->has('error'))
        <div class="flex items-center justify-between max-w-xl p-[15px] bg-red-600 border rounded-[20px] shadow-sm gap-5">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7503 2.60877C17.0812 -0.274138 12.919 -0.274124 11.2499 2.60877L0.580845 21.0372C-1.09167 23.9261 0.992926 27.5416 4.33103 27.5416H25.6692C29.0073 27.5416 31.0919 23.926 29.4193 21.0372L18.7503 2.60877ZM14.9988 7.54157C15.8272 7.5409 16.4993 8.21194 16.5 9.04037L16.5057 16.1237C16.5063 16.9521 15.8353 17.6242 15.0069 17.6249C14.1784 17.6256 13.5063 16.9545 13.5057 16.1261L13.5 9.04276C13.4993 8.21434 14.1704 7.54223 14.9988 7.54157ZM15 22.6666C15.8284 22.6666 16.5 21.995 16.5 21.1666C16.5 20.3381 15.8284 19.6666 15 19.6666C14.1716 19.6666 13.5 20.3381 13.5 21.1666C13.5 21.995 14.1716 22.6666 15 22.6666Z" fill="white"/>
                </svg>
                <p class="ml-3 text-[18px] font-medium text-white">{{ session()->get('error') }}</p>
            </div>
            <span @click="showMessage = false" class="inline-flex items-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
    @endif
</div>
@if ($errors->any())
    <div x-data="{ showMessage: true }" x-show="showMessage" class="fixed flex flex-col gap-4 justify-center top-[108px] right-[28px]">
        @foreach($errors->all() as $error)
            <div class="flex items-center justify-between max-w-xl p-[15px] bg-red-600 border rounded-[20px] shadow-sm gap-5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7503 2.60877C17.0812 -0.274138 12.919 -0.274124 11.2499 2.60877L0.580845 21.0372C-1.09167 23.9261 0.992926 27.5416 4.33103 27.5416H25.6692C29.0073 27.5416 31.0919 23.926 29.4193 21.0372L18.7503 2.60877ZM14.9988 7.54157C15.8272 7.5409 16.4993 8.21194 16.5 9.04037L16.5057 16.1237C16.5063 16.9521 15.8353 17.6242 15.0069 17.6249C14.1784 17.6256 13.5063 16.9545 13.5057 16.1261L13.5 9.04276C13.4993 8.21434 14.1704 7.54223 14.9988 7.54157ZM15 22.6666C15.8284 22.6666 16.5 21.995 16.5 21.1666C16.5 20.3381 15.8284 19.6666 15 19.6666C14.1716 19.6666 13.5 20.3381 13.5 21.1666C13.5 21.995 14.1716 22.6666 15 22.6666Z" fill="white"/>
                    </svg>
                    <p class="ml-3 text-[18px] font-medium text-white">{{ $error }}</p>
                </div>
                <span @click="showMessage = false" class="inline-flex items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endforeach
    </div>
@endif
