<ul class="h-full list-reset">
    <li><a class="block hover:bg-grey-lightest text-grey-darker no-underline px-6 py-4 {{ Route::currentRouteIs('settings.account', 'bg-grey-lightest hover:bg-grey-lightest font-semibold text-blue border-r-2 -mr-px border-blue') }}" href="{{ route('settings.account') }}">Your Account</a></li>
    <li><a class="block hover:bg-grey-lightest text-grey-darker no-underline px-6 py-4 {{ Route::currentRouteIs('settings.social', 'bg-grey-lightest hover:bg-grey-lightest font-semibold text-blue border-r-2 -mr-px border-blue') }}" href="{{ route('settings.social') }}">Social Login</a></li>

    <li><a class="block hover:bg-grey-lightest text-grey-darker no-underline px-6 py-4" href="#" @click.prevent="post('{{ route('auth.logout') }}')">Logout</a></li>
</ul>
