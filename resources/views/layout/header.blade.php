<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title')</title>
</head>

<header>
    <div>
        <nav class="bg-gray-800">
            <div class=" max-w-7xl mx-auto px-8">
                <div class="flex items-center justify-between h-16">
                    <div class=" flex items-center">
                        <a class="flex-shrink-0" href="/">
                            <svg class="h-9 w-9" version="1.0" xmlns="http://www.w3.org/2000/svg" width="1280.000000pt" height="826.000000pt" viewBox="0 0 1280.000000 826.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,826.000000) scale(0.100000,-0.100000)" fill="{{ Route::is('home') ? 'green' : 'white'  }}" stroke="none">
                                    <path d="M898 8240 c-128 -28 -235 -77 -301 -139 -41 -38 -137 -196 -137 -226
                                        l0 -25 -218 0 c-156 0 -221 -3 -230 -12 -17 -17 -17 -779 0 -796 9 -9 74 -12
                                        230 -12 l218 0 0 -366 c0 -272 -3 -371 -12 -387 -17 -29 -17 -215 0 -244 7
                                        -13 12 -58 12 -107 l0 -86 475 0 474 0 3 -71 3 -72 985 1 c542 1 1201 -2 1465
                                        -7 532 -9 574 -14 792 -86 428 -143 725 -480 817 -928 44 -214 48 -503 10
                                        -713 -6 -31 -5 -31 88 -72 358 -157 798 -255 1313 -293 205 -15 692 -6 830 15
                                        55 8 156 29 225 46 381 93 644 52 829 -129 104 -102 161 -210 212 -401 11 -41
                                        77 -277 145 -525 262 -943 302 -1143 318 -1610 7 -197 -7 -547 -24 -621 -9
                                        -35 -10 -89 -5 -178 6 -113 10 -130 31 -155 13 -16 38 -31 55 -35 24 -5 2133
                                        180 2385 209 42 5 53 11 63 31 6 14 11 34 11 44 0 13 7 20 20 20 16 0 20 -7
                                        20 -33 0 -44 53 -149 92 -182 83 -70 206 -94 306 -61 153 51 238 232 177 378
                                        -6 15 2 17 72 20 l78 3 17 70 c40 159 52 282 52 550 1 269 -10 408 -45 570
                                        -33 157 -411 1134 -871 2255 -248 603 -272 682 -272 895 1 139 17 215 70 315
                                        123 235 378 394 849 530 93 28 181 58 194 68 86 64 105 210 37 289 -22 25 -28
                                        27 -127 30 -62 1 -131 10 -170 21 -197 55 -366 224 -456 457 -15 38 -33 75
                                        -39 80 -6 6 -19 39 -29 75 -22 85 -97 274 -147 374 l-40 79 30 66 c17 36 53
                                        131 82 211 29 80 61 163 72 184 61 119 16 271 -96 328 -64 33 -125 28 -231
                                        -16 -187 -79 -247 -83 -365 -20 l-71 37 -48 -22 -48 -23 -85 56 -86 56 -161 0
                                        c-143 0 -161 2 -169 18 -5 9 -24 68 -42 130 l-33 112 -101 0 -101 0 -45 -128
                                        -45 -127 -1477 -3 -1478 -2 0 -50 0 -50 -2954 0 -2953 0 -25 38 c-14 20 -35
                                        56 -47 80 l-21 42 -61 0 -60 0 -59 125 c-32 69 -65 125 -72 124 -7 0 -52 -9
                                        -100 -19z m10881 -495 c59 -50 62 -132 7 -184 -76 -72 -196 -20 -196 85 0 25
                                        7 56 16 70 38 57 122 71 173 29z m-4616 -2392 c58 -215 74 -469 41 -631 -31
                                        -155 -108 -300 -226 -426 -99 -106 -196 -179 -377 -284 -11 -6 -10 -15 8 -50
                                        12 -23 28 -42 35 -42 22 0 185 59 241 87 208 104 349 256 496 535 77 146 105
                                        182 157 201 l35 12 -7 210 -6 210 55 24 c65 28 126 91 151 158 16 42 19 44 49
                                        39 114 -22 329 -114 445 -191 76 -50 170 -147 232 -238 135 -199 163 -423 77
                                        -623 -50 -118 -178 -271 -283 -338 -323 -206 -906 -330 -1396 -296 -449 32
                                        -801 161 -1033 379 -172 162 -249 326 -248 530 0 177 69 360 195 516 155 193
                                        323 270 671 309 17 1 172 4 346 5 l316 1 26 -97z m5274 -4960 c24 -31 28 -46
                                        28 -98 0 -52 -4 -67 -28 -98 -38 -51 -81 -71 -148 -71 -72 -1 -132 36 -160 97
                                        -23 51 -24 86 -4 134 30 71 35 73 166 73 l118 0 28 -37z" />
                                </g>
                            </svg>
                        </a>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ Route::is('home') ? 'text-green-500' : '' }}" href="{{ route('home') }}">
                                    Home
                                </a>
                                <a class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ Route::is('servicos') ? 'text-green-500' : '' }}" href="{{ route('servicos') }}">
                                    Serviços
                                </a>
                                <a class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ Route::is('quem-eu-devo') ? 'text-green-500' : '' }}" href="{{ route('quem-eu-devo') }}">
                                    Quem eu devo
                                </a>
                                <a class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ Route::is('quem-me-deve') ? 'text-green-500' : '' }}" href="{{ route('quem-me-deve') }}">
                                    Quem me deve
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="ml-4 flex items-center md:ml-6">
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button class="text-gray-800 dark:text-white hover:text-gray-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
                            <svg width="20" height="20" fill="currentColor" class="h-8 w-8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            {{-- <div class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                        Home
                    </a>
                    <a class="text-gray-800 dark:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                        Gallery
                    </a>
                    <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                        Content
                    </a>
                    <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                        Contact
                    </a>
                </div>
            </div> --}}
        </nav>
    </div>
</header>

<body class="h-full flex flex-col">
