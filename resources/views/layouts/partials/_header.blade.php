<div class="w-full block h-2 bg-blue"></div>

<div class="w-full bg-grey-lightest border-b p-6">
    <div class="max-w-2xl mx-auto flex flex-wrap items-center justify-between">
        <div class="text-lg mr-6">
            <a class="font-medium text-grey-darker no-underline hover:underline" href="/">{{ config('app.name') }}</a>
        </div>

        <div class="block md:hidden">
            <a @click.prevent="displayNavigation = !displayNavigation" class="flex items-center no-underline text-blue-dark hover:text-blue" href="#">
                <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </a>
        </div>

        <div :class="{ hidden: !displayNavigation }" class="w-full flex-grow md:flex md:items-center md:w-auto mt-6 md:mt-0">
            <div class="block md:flex-grow">
                <ul class="flex flex-col sm:flex-row list-reset -mb-6 md:-mr-6 md:mb-0">
                    <li class="mb-6 md:mr-6 md:mb-0"><a class="block md:inline text-blue-dark no-underline hover:underline" href="{{ route('home') }}">Home</a></li>
                </ul>
            </div>

            <div class="mt-6 md:mt-0">
                <ul class="flex flex-col sm:flex-row list-reset -mb-6 md:-mr-6 md:mb-0">
                    @auth
                        <li class="mb-6 md:mr-6 md:mb-0 flex items-center">
                            <img class="block w-5 h-5 select-none pointer-events-none rounded-full" src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->getDisplayName() }}" />

                            <a class="ml-2 block md:inline text-grey-darker no-underline hover:underline" href="{{ route('settings.account') }}">{{ auth()->user()->getDisplayName() }}</a>
                        </li>
                    @else
                        <li class="mb-6 md:mr-6 md:mb-0"><a class="block md:inline text-blue-dark no-underline hover:underline" href="{{ route('auth.login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
