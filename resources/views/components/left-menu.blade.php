<div class="nav__content">
    <ul class="nav__menu">
        <li class="nav__item">
            <a class="@if(request()->routeIs('cabinet.index')) active @endif" href="{{ route('cabinet.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M4 16C4 14.9391 4.42143 13.9217 5.17157 13.1716C5.92172 12.4214 6.93913 12 8 12H16C17.0609 12 18.0783 12.4214 18.8284 13.1716C19.5786 13.9217 20 14.9391 20 16C20 16.5304 19.7893 17.0391 19.4142 17.4142C19.0391 17.7893 18.5304 18 18 18H6C5.46957 18 4.96086 17.7893 4.58579 17.4142C4.21071 17.0391 4 16.5304 4 16Z" stroke="#000" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M12 10C13.6569 10 15 8.65685 15 7C15 5.34315 13.6569 4 12 4C10.3431 4 9 5.34315 9 7C9 8.65685 10.3431 10 12 10Z" stroke="#000" stroke-width="2"/>
                </svg>
                Профиль
            </a>
        </li>
        <li class="nav__item">
            <a href="{{ route('news.index') }}" class="@if(request()->routeIs('news.index')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M16 6H19C19.2652 6 19.5196 6.10536 19.7071 6.29289C19.8946 6.48043 20 6.73478 20 7V18C20 18.5304 19.7893 19.0391 19.4142 19.4142C19.0391 19.7893 18.5304 20 18 20M18 20C17.4696 20 16.9609 19.7893 16.5858 19.4142C16.2107 19.0391 16 18.5304 16 18V5C16 4.73478 15.8946 4.48043 15.7071 4.29289C15.5196 4.10536 15.2652 4 15 4H5C4.73478 4 4.48043 4.10536 4.29289 4.29289C4.10536 4.48043 4 4.73478 4 5V17C4 17.7956 4.31607 18.5587 4.87868 19.1213C5.44129 19.6839 6.20435 20 7 20H18ZM8 8H12M8 12H12M8 16H12" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Лента
            </a>
        </li>
        <li class="nav__item">
            <a href="#" class="@if(request()->routeIs('cabinet.index')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M8 9H16M8 13H14M18 4C18.7956 4 19.5587 4.31607 20.1213 4.87868C20.6839 5.44129 21 6.20435 21 7V15C21 15.7956 20.6839 16.5587 20.1213 17.1213C19.5587 17.6839 18.7956 18 18 18H13L8 21V18H6C5.20435 18 4.44129 17.6839 3.87868 17.1213C3.31607 16.5587 3 15.7956 3 15V7C3 6.20435 3.31607 5.44129 3.87868 4.87868C4.44129 4.31607 5.20435 4 6 4H18Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Форум
            </a>
        </li>
        <li class="nav__item">
            <a href="#" class="@if(request()->routeIs('cabinet.index')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3.5 11V14C3.5 17.771 3.5 19.657 4.672 20.828C5.843 22 7.729 22 11.5 22H12.5C16.271 22 18.157 22 19.328 20.828M20.5 11V14C20.5 15.17 20.5 16.158 20.465 17" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M9.50002 2H14.5M9.50002 2L8.84802 8.517C8.80507 8.95677 8.85461 9.40065 8.99347 9.82013C9.13233 10.2396 9.35743 10.6254 9.65429 10.9526C9.95116 11.2799 10.3132 11.5415 10.7172 11.7204C11.1212 11.8994 11.5582 11.9919 12 11.9919C12.4419 11.9919 12.8788 11.8994 13.2828 11.7204C13.6868 11.5415 14.0489 11.2799 14.3458 10.9526C14.6426 10.6254 14.8677 10.2396 15.0066 9.82013C15.1454 9.40065 15.195 8.95677 15.152 8.517L14.5 2M9.50002 2H7.41802C6.51002 2 6.05602 2 5.66602 2.107C5.26039 2.21826 4.88269 2.41356 4.55743 2.68025C4.23217 2.94694 3.96662 3.27904 3.77802 3.655M9.50002 2L8.77502 9.245C8.73676 9.65963 8.61428 10.0621 8.41508 10.4277C8.21588 10.7934 7.94414 11.1145 7.61651 11.3715C7.28888 11.6285 6.91225 11.8159 6.50968 11.9223C6.1071 12.0287 5.68706 12.0518 5.27525 11.9901C4.86344 11.9285 4.46853 11.7835 4.11471 11.564C3.76089 11.3445 3.45559 11.0551 3.21751 10.7135C2.97943 10.3718 2.81357 9.98523 2.73009 9.5773C2.64662 9.16936 2.64727 8.74867 2.73202 8.341L2.80002 8M14.5 2H16.582C17.49 2 17.944 2 18.334 2.107C18.7397 2.21826 19.1174 2.41356 19.4426 2.68025C19.7679 2.94694 20.0334 3.27904 20.222 3.655C20.403 4.015 20.492 4.461 20.67 5.351L21.268 8.341C21.3528 8.74867 21.3534 9.16936 21.27 9.5773C21.1865 9.98523 21.0206 10.3718 20.7825 10.7135C20.5445 11.0551 20.2392 11.3445 19.8853 11.564C19.5315 11.7835 19.1366 11.9285 18.7248 11.9901C18.313 12.0518 17.8929 12.0287 17.4904 11.9223C17.0878 11.8159 16.7112 11.6285 16.3835 11.3715C16.0559 11.1145 15.7842 10.7934 15.585 10.4277C15.3858 10.0621 15.2633 9.65963 15.225 9.245L14.5 2ZM9.50002 21.5V18.5C9.50002 17.565 9.50002 17.098 9.70102 16.75C9.83267 16.522 10.022 16.3326 10.25 16.201C10.598 16 11.065 16 12 16C12.935 16 13.402 16 13.75 16.201C13.978 16.3326 14.1674 16.522 14.299 16.75C14.5 17.098 14.5 17.565 14.5 18.5V21.5" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                Магазин
            </a>
        </li>
        <li class="nav__item">
            <a href="#" class="@if(request()->routeIs('cabinet.index')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M4 16C4 14.9391 4.42143 13.9217 5.17157 13.1716C5.92172 12.4214 6.93913 12 8 12H16C17.0609 12 18.0783 12.4214 18.8284 13.1716C19.5786 13.9217 20 14.9391 20 16C20 16.5304 19.7893 17.0391 19.4142 17.4142C19.0391 17.7893 18.5304 18 18 18H6C5.46957 18 4.96086 17.7893 4.58579 17.4142C4.21071 17.0391 4 16.5304 4 16Z" stroke="#000" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M12 10C13.6569 10 15 8.65685 15 7C15 5.34315 13.6569 4 12 4C10.3431 4 9 5.34315 9 7C9 8.65685 10.3431 10 12 10Z" stroke="#000" stroke-width="2"/>
                </svg>
                Профиль
            </a>
        </li>
        <li class="nav__item">
            <a href="#" class="@if(request()->routeIs('cabinet.index')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M4 16C4 14.9391 4.42143 13.9217 5.17157 13.1716C5.92172 12.4214 6.93913 12 8 12H16C17.0609 12 18.0783 12.4214 18.8284 13.1716C19.5786 13.9217 20 14.9391 20 16C20 16.5304 19.7893 17.0391 19.4142 17.4142C19.0391 17.7893 18.5304 18 18 18H6C5.46957 18 4.96086 17.7893 4.58579 17.4142C4.21071 17.0391 4 16.5304 4 16Z" stroke="#000" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M12 10C13.6569 10 15 8.65685 15 7C15 5.34315 13.6569 4 12 4C10.3431 4 9 5.34315 9 7C9 8.65685 10.3431 10 12 10Z" stroke="#000" stroke-width="2"/>
                </svg>
                Профиль
            </a>
        </li>
        <hr class="hr_menu">
        <li class="nav__item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="exit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                        <path d="M17 9C17.5523 9 18 8.55228 18 8C18 7.44772 17.5523 7 17 7L17 9ZM0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM17 7L1 7L1 9L17 9L17 7Z" fill="#FF0000"/>
                    </svg>
                    Выйти
                </button>
            </form>
        </li>
    </ul>

</div>
