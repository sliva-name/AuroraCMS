@extends('layouts.app')
@section('title', 'Новости проекта')
@section('content')
    <h1 class="title_page">Новостная лента</h1>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post">
                <h2 class="post__header">{{ $post->title }}</h2>
                <div class="post__date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M1 6.3125H14.4583M1 6.3125V12.4583C1 13.5629 1.89543 14.4583 3 14.4583H12.4583C13.5629 14.4583 14.4583 13.5629 14.4583 12.4583V6.3125M1 6.3125V4.0625C1 2.95793 1.89543 2.0625 3 2.0625H12.4583C13.5629 2.0625 14.4583 2.95793 14.4583 4.0625V6.3125M4.89583 1V3.83333M10.5625 1V3.83333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>{{ $post->created_at->format('d.m.Y') }}</span>
                </div>
                <p class="post__text">{{ $post->text }}</p>
                <div class="post_buttons">
                    <form action="{{ route('news.add.like', $post) }}" method="post">
                        @csrf
                        <button type="submit" class="post_button">
                            @if($post->isAuthUserLikedPost())
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M1.5625 9.17969C1.5625 16.0156 11.6982 21.5488 12.1299 21.7773C12.2437 21.8385 12.3708 21.8706 12.5 21.8706C12.6292 21.8706 12.7564 21.8385 12.8701 21.7773C13.3018 21.5488 23.4375 16.0156 23.4375 9.17969C23.4357 7.57444 22.7972 6.03546 21.6621 4.90038C20.527 3.76529 18.9881 3.12681 17.3828 3.125C15.3662 3.125 13.6006 3.99219 12.5 5.45801C11.3994 3.99219 9.63379 3.125 7.61719 3.125C6.01194 3.12681 4.47296 3.76529 3.33788 4.90038C2.20279 6.03546 1.56431 7.57444 1.5625 9.17969Z" fill="#FF0000"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M17.073 3.44824C15.1111 3.44824 13.3699 4.22266 12.1902 5.55371C11.0105 4.22266 9.26929 3.44824 7.30737 3.44824C5.5986 3.45031 3.96042 4.13003 2.75213 5.33831C1.54385 6.5466 0.864128 8.18479 0.862061 9.89356C0.862061 16.958 11.1951 22.6025 11.6345 22.8398C11.8053 22.9318 11.9962 22.98 12.1902 22.98C12.3841 22.98 12.5751 22.9318 12.7458 22.8398C13.1853 22.6025 23.5183 16.958 23.5183 9.89356C23.5162 8.18479 22.8365 6.5466 21.6282 5.33831C20.42 4.13003 18.7818 3.45031 17.073 3.44824ZM16.5369 17.3506C15.1768 18.5047 13.7228 19.5435 12.1902 20.4561C10.6575 19.5435 9.20359 18.5047 7.84351 17.3506C5.72729 15.5352 3.20581 12.7666 3.20581 9.89356C3.20581 8.80575 3.63794 7.7625 4.40713 6.99331C5.17632 6.22412 6.21957 5.79199 7.30737 5.79199C9.04565 5.79199 10.5007 6.70996 11.1052 8.18848C11.1932 8.40401 11.3434 8.58846 11.5366 8.71829C11.7299 8.84812 11.9574 8.91746 12.1902 8.91746C12.423 8.91746 12.6505 8.84812 12.8437 8.71829C13.037 8.58846 13.1872 8.40401 13.2751 8.18848C13.8796 6.70996 15.3347 5.79199 17.073 5.79199C18.1608 5.79199 19.204 6.22412 19.9732 6.99331C20.7424 7.7625 21.1746 8.80575 21.1746 9.89356C21.1746 12.7666 18.6531 15.5352 16.5369 17.3506Z" fill="#FF0000"/>
                                </svg>
                            @endif
                            {{ $post->likes()->count() }}
                        </button>
                    </form>
                    <button class="post_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <path d="M12.5 21.875C14.3542 21.875 16.1668 21.3252 17.7085 20.295C19.2502 19.2649 20.4518 17.8007 21.1614 16.0877C21.8709 14.3746 22.0566 12.4896 21.6949 10.671C21.3331 8.85246 20.4402 7.182 19.1291 5.87088C17.818 4.55976 16.1475 3.66688 14.329 3.30514C12.5104 2.94341 10.6254 3.12906 8.91234 3.83863C7.19929 4.54821 5.73511 5.74982 4.70497 7.29153C3.67483 8.83324 3.125 10.6458 3.125 12.5C3.125 14.05 3.5 15.5115 4.16667 16.799L3.125 21.875L8.20104 20.8333C9.48854 21.5 10.951 21.875 12.5 21.875Z" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        1
                    </button>
                    <div class="post_button__view">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="27" viewBox="0 0 32 27" fill="none">
                            <path d="M30.9401 13.2131C29.7639 10.6461 27.722 8.42621 25.0669 6.8277C22.4117 5.22919 19.2595 4.32217 16.0001 4.21875C12.7406 4.32217 9.58845 5.22919 6.93326 6.8277C4.27808 8.42621 2.23622 10.6461 1.06006 13.2131C0.98063 13.3985 0.98063 13.6015 1.06006 13.7869C2.23622 16.3539 4.27808 18.5738 6.93326 20.1723C9.58845 21.7708 12.7406 22.6778 16.0001 22.7812C19.2595 22.6778 22.4117 21.7708 25.0669 20.1723C27.722 18.5738 29.7639 16.3539 30.9401 13.7869C31.0195 13.6015 31.0195 13.3985 30.9401 13.2131ZM16.0001 21.0938C10.7001 21.0938 5.10006 17.7778 3.07006 13.5C5.10006 9.22219 10.7001 5.90625 16.0001 5.90625C21.3001 5.90625 26.9001 9.22219 28.9301 13.5C26.9001 17.7778 21.3001 21.0938 16.0001 21.0938Z" fill="black"/>
                            <path d="M16 8.4375C14.8133 8.4375 13.6533 8.73441 12.6666 9.29069C11.6799 9.84696 10.9109 10.6376 10.4567 11.5627C10.0026 12.4877 9.88378 13.5056 10.1153 14.4876C10.3468 15.4697 10.9182 16.3717 11.7574 17.0797C12.5965 17.7877 13.6656 18.2699 14.8295 18.4652C15.9933 18.6606 17.1997 18.5603 18.2961 18.1771C19.3925 17.794 20.3295 17.1451 20.9888 16.3126C21.6481 15.4801 22 14.5013 22 13.5C22 12.1573 21.3679 10.8697 20.2426 9.92027C19.1174 8.97087 17.5913 8.4375 16 8.4375ZM16 16.875C15.2089 16.875 14.4355 16.6771 13.7777 16.3062C13.1199 15.9354 12.6072 15.4083 12.3045 14.7916C12.0017 14.1749 11.9225 13.4963 12.0769 12.8416C12.2312 12.1869 12.6122 11.5855 13.1716 11.1135C13.731 10.6415 14.4437 10.3201 15.2196 10.1898C15.9956 10.0596 16.7998 10.1265 17.5307 10.3819C18.2616 10.6374 18.8864 11.0699 19.3259 11.625C19.7654 12.18 20 12.8325 20 13.5C20 14.3951 19.5786 15.2536 18.8284 15.8865C18.0783 16.5194 17.0609 16.875 16 16.875Z" fill="black"/>
                        </svg>
                        {{ $post->views }}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection