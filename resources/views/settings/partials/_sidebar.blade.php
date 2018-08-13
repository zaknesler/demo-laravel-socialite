<ul class="h-full list-reset">
    <li>
        <a class="block hover:bg-grey-lightest text-grey-darker no-underline px-6 py-4 flex items-center {{ Route::currentRouteIs('settings.account', 'bg-grey-lightest hover:bg-grey-lightest font-semibold text-blue border-r-2 -mr-px border-blue') }}" href="{{ route('settings.account') }}">
            <svg class="w-3 h-3 opacity-50 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>

            <span class="ml-3">Your Account</span>
        </a>
    </li>

    <li>
        <a class="block hover:bg-grey-lightest text-grey-darker no-underline px-6 py-4 flex items-center {{ Route::currentRouteIs('settings.api', 'bg-grey-lightest hover:bg-grey-lightest font-semibold text-blue border-r-2 -mr-px border-blue') }}" href="{{ route('settings.api') }}">
            <svg class="w-3 h-3 opacity-50 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 14v4a2 2 0 0 1-2 2h-4v-2a2 2 0 0 0-2-2 2 2 0 0 0-2 2v2H6a2 2 0 0 1-2-2v-4H2a2 2 0 0 1-2-2 2 2 0 0 1 2-2h2V6c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2 2 2 0 0 1 2 2v2h4a2 2 0 0 1 2 2v4h-2a2 2 0 0 0-2 2 2 2 0 0 0 2 2h2z"/></svg>

            <span class="ml-3">API</span>
        </a>
    </li>

    <li>
        <a class="block hover:bg-grey-lightest text-grey-darker no-underline px-6 py-4 flex items-center {{ Route::currentRouteIs('settings.social', 'bg-grey-lightest hover:bg-grey-lightest font-semibold text-blue border-r-2 -mr-px border-blue') }}" href="{{ route('settings.social') }}">
            <svg class="w-3 h-3 opacity-50 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 8V6a6 6 0 1 1 12 0h-3v2h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/></svg>

            <span class="ml-3">Authentication</span>
        </a>
    </li>

    <li>
        <a class="block hover:bg-grey-lightest text-grey-darker no-underline px-6 py-4 flex items-center" href="#" @click.prevent="logout">
            <svg class="w-3 h-3 opacity-50 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8 10v-5l8 7-8 7v-5h-8v-4h8zm2-8v2h12v16h-12v2h14v-20h-14z"/></svg>

            <span class="ml-3">Logout</span>
        </a>
    </li>
</ul>
