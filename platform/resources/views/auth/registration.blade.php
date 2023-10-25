@extends('core.structure.app')

@section('title')
    Landing page
@endsection

@section('header')
    Header
@endsection

@section('main')
    <div id="app">
        <Registration></Registration>
    </div>
@endsection

@section('footer')
    Footer
@endsection

@section('style')
{{--    <link rel="stylesheet" href="/css/performance.css">--}}
@endsection

@section('script')
    <script src="/js/auth.js" defer></script>
@endsection
