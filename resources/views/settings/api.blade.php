@extends('settings/layouts/master')

@section('title', 'API settings')

@section('settings.content')
    <passport-clients></passport-clients>
    {{-- <passport-authorized-clients></passport-authorized-clients> --}}
    {{-- <passport-personal-access-tokens></passport-personal-access-tokens> --}}
@endsection
