@extends('core.structure.app')

@section('title')
    Dashboard
@endsection

@section('main')
   <div id="app">
       <Index></Index>
   </div>
@endsection

@section('script')
    <script src="/js/game.js" defer></script>
@endsection
