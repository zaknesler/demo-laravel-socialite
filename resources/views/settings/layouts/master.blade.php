@extends('layouts/base')

@section('show-header', true)

@section('content-full')
    <div class="max-w-2xl mx-auto p-6">
        <div class="text-lg font-semibold text-grey-darkest mb-6">@yield('title')</div>

        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/4 lg:w-1/5 pb-8 md:pb-0 md:pr-8">
                @include('settings/partials/_sidebar')
            </div>

            <div class="flex-1">
                <div class="w-full md:w-3/5">
                    @yield('settings.content')
                </div>
            </div>
        </div>
    </div>
@endsection
