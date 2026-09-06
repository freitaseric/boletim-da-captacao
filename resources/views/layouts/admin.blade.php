<!DOCTYPE html>
<html lang="pt-BR" data-theme="bdc">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin — Boletim da Captação')</title>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-base-200 text-base-content font-sans">
    <div class="drawer lg:drawer-open">
        <input id="admin-navigation" type="checkbox" class="drawer-toggle">

        <div class="drawer-content min-h-screen">
            <header class="flex h-16 items-center bg-primary px-4 text-primary-content lg:hidden">
                <label
                    for="admin-navigation"
                    class="btn btn-ghost btn-square"
                    aria-label="Abrir navegação">
                    <span class="text-xl text-primary-content">☰</span>
                </label>

                <span class="ml-2 font-serif font-semibold">
                    Boletim da Captação
                </span>
            </header>

            <main class="min-h-screen px-5 py-6 lg:px-10 lg:py-9">
                @yield('content')
            </main>
        </div>

        <div class="drawer-side">
            <label for="admin-navigation" aria-label="Fechar navegação" class="drawer-overlay"></label>

            <aside class="flex min-h-full w-62 flex-col bg-primary px-5 pb-6 pt-7 text-primary-content">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/brand/bdc-symbol-inverse.svg') }}" alt="" class="size-11 shrink-0">

                    <span class="font-serif text-base font-semibold leading-5">Boletim da Captação</span>
                </div>

                <div class="h-5 shrink-0"></div>

                <nav class="flex flex-col gap-2">
                    <a
                        href="{{ route('admin.dashboard') }}"
                        @class([ 'flex h-11 items-center rounded-navigation px-3.5 text-sm font-semibold tracking-[0.14px]' , 'bg-base-300 text-primary'=> request()->routeIs('admin.dashboard'), 'text-primary-content' => ! request()->routeIs('admin.dashboard'),
                        ])>
                        Dashboard
                    </a>
                    <a
                        href="{{ route('admin.sources.index') }}"
                        @class([ 'flex h-11 items-center rounded-navigation px-3.5 text-sm font-semibold tracking-[0.14px]' , 'bg-base-300 text-primary'=> request()->routeIs('admin.sources.*'), 'text-primary-content' => ! request()->routeIs('admin.sources.*'),
                        ])>
                        Fontes
                    </a>
                    <a
                        href="{{ route('admin.opportunities.index') }}"
                        @class([ 'flex h-11 items-center rounded-navigation px-3.5 text-sm font-semibold tracking-[0.14px]' , 'bg-base-300 text-primary'=> request()->routeIs('admin.opportunities.*'), 'text-primary-content' => ! request()->routeIs('admin.opportunities.*'),
                        ])>
                        Oportunidades
                    </a>
                    <a
                        href="{{ route('admin.editions.index') }}"
                        @class([ 'flex h-11 items-center rounded-navigation px-3.5 text-sm font-semibold tracking-[0.14px]' , 'bg-base-300 text-primary'=> request()->routeIs('admin.editions.*'), 'text-primary-content' => ! request()->routeIs('admin.editions.*'),
                        ])>
                        Edições
                    </a>
                    <a
                        href="{{ route('admin.subscribers.index') }}"
                        @class([ 'flex h-11 items-center rounded-navigation px-3.5 text-sm font-semibold tracking-[0.14px]' , 'bg-base-300 text-primary'=> request()->routeIs('admin.subscribers.*'), 'text-primary-content' => ! request()->routeIs('admin.subscribers.*'),
                        ])>
                        Inscritos
                    </a>
                </nav>

                <details class="dropdown dropdown-top mt-auto w-full">
                    <summary class="cursor-pointer list-none">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-sm font-semibold">Administrador</span>

                            <span class="text-xs font-medium opacity-70">
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                    </summary>

                    <ul class="menu dropdown-content z-10 mb-2 w-full rounded-box bg-base-100 p-2 text-base-content shadow">
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf

                                <button type="submit" class="w-full">
                                    Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </details>
            </aside>
        </div>

    </div>
</body>

</html>