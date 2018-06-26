<ul class="list-reset -mb-3">
    {{-- <li><a class="{{ Route::currentRouteIs('settings.account', 'font-semibold text-blue ') }}text-grey-darker no-underline hover:underline" href="{{ route('settings.account') }}">Account</a></li> --}}

    <li><a class="block {{ Route::currentRouteIs('settings.account', 'border-blue text-blue bg-grey-lightest ') }} block border-l-4 border-white px-6 py-3 font-semibold text-grey-darker no-underline hover:underline" href="{{ route('settings.account') }}">Account</a></li>
    <li><a class="block {{ Route::currentRouteIs('settings.social', 'border-blue text-blue bg-grey-lightest ') }} block border-l-4 border-white px-6 py-3 font-semibold text-grey-darker no-underline hover:underline" href="{{ route('settings.social') }}">Social</a></li>

    <li><a class="block border-l-4 border-white px-6 py-3 font-semibold text-grey-darker no-underline hover:underline" href="#" @click.prevent="logout">Logout</a></li>
</ul>
