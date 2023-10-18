<nav>
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="38" viewBox="0 0 100 38" fill="none">
                    <g clip-path="url(#clip0_1_1683)">
                        <mask id="mask0_1_1683" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="100" height="38">
                            <path d="M100 0H0V38H100V0Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_1_1683)">
                            <path d="M33.5 20L33.5345 10H38.5V29.7436C38.5 32.4957 35.8931 38 25.4655 38V34.2404C28.1552 34.2404 33.5345 33.2231 33.5345 29.7436L33.5 25C22.2241 25 21 16.266 21 10H25.4655C25.4655 17.1359 29.6724 20 33.5 20Z" fill="#4557F4"/>
                            <path d="M75.0345 22L75 10H80V27H75C63.7241 27 62 16.266 62 10H67C67 17.1359 71.2069 22 75.0345 22Z" fill="#4557F4"/>
                            <path d="M46.9181 15V27H42V0H46.9181V10C61 10 58.8377 20.9578 58.8377 27H53.8855C53.8855 15.4286 53.8855 15 46.9181 15Z" fill="#4557F4"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H5C9.03448 0 12.2367 0.799452 14.5012 2.39298C16.8636 4.05538 18 6.44808 18 9C18 11.5519 16.8636 13.9446 14.5012 15.607C14.3323 15.7259 14.1582 15.8403 13.9789 15.9503C14.4255 16.3491 14.8373 16.7876 15.2137 17.2653C17.3394 19.9633 18 23.5005 18 27H13C13 23.9995 12.4106 21.7867 11.2863 20.3597C10.2532 19.0485 8.44721 18 5 18V27H0V0ZM5 5V13C8.46552 13 10.5133 12.2995 11.6238 11.518C12.6364 10.8054 13 9.94808 13 9C13 8.05192 12.6364 7.19462 11.6238 6.48202C10.5133 5.70055 8.46552 5 5 5Z" fill="#4557F4"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M86 15H83V10H86C88.4045 10 90.2224 10.8861 91.5 12.1617C92.7776 10.8861 94.5955 10 97 10H100V15H97C95.7102 15 95.0889 15.5175 94.6865 16.1271C94.1953 16.8714 94 17.8587 94 18.5C94 19.1413 94.1953 20.1286 94.6865 20.8729C95.0889 21.4825 95.7102 22 97 22H100V27H97C94.5955 27 92.7776 26.1139 91.5 24.8383C90.2224 26.1139 88.4045 27 86 27H83V22H86C87.2898 22 87.9111 21.4825 88.3135 20.8729C88.8047 20.1286 89 19.1413 89 18.5C89 17.8587 88.8047 16.8714 88.3135 16.1271C87.9111 15.5175 87.2898 15 86 15Z" fill="#4557F4"/>
                        </g>
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1683">
                            <rect width="100" height="38" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            @auth()
                <div class="profile">
                    <button class="notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_125_157)">
                                <path d="M12 4.73529C9.75 4.73529 5.25 6.07647 5.25 11.4412V15.5997C5.25 15.7994 5.17031 15.9909 5.02859 16.1317L4.2905 16.865C3.81564 17.3367 4.14972 18.1471 4.81909 18.1471H8.625M12 4.73529C17.4 4.73529 18.75 9.20588 18.75 11.4412V15.5997C18.75 15.7994 18.8297 15.9909 18.9714 16.1317L19.7095 16.865C20.1844 17.3367 19.8503 18.1471 19.1809 18.1471H15.375M12 4.73529V2.5M8.625 18.1471C8.625 19.2647 9.3 21.5 12 21.5C14.7 21.5 15.375 19.2647 15.375 18.1471M8.625 18.1471H15.375" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_125_157">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="count">0</span>
                    </button>
                    <div class="avatar">
                        <canvas id="skin_header" data="{{ auth()->user()->skin }}"></canvas>
                        <div class="flex flex-col">
                            <div class="profile__name">
                                {{ auth()->user()->name }}
                            </div>
                            <div class="profile__email">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</nav>



