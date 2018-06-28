<ul class="bg-grey-lightest shadow rounded overflow-hidden list-reset">
    <li><a class="{{ Route::currentRouteIs('settings.account', 'bg-blue text-white ') }} block font-semibold text-grey-darker no-underline hover:underline px-6 py-4" href="{{ route('settings.account') }}">Account</a></li>
    <li><a class="{{ Route::currentRouteIs('settings.social', 'bg-blue text-white ') }} block font-semibold text-grey-darker no-underline hover:underline px-6 py-4" href="{{ route('settings.social') }}">Social</a></li>

    <li><a class="block font-semibold text-grey-darker no-underline hover:underline px-6 py-4" href="#" @click.prevent="logout">Logout</a></li>
</ul>
