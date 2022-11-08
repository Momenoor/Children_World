@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('pages.messenger.partials.messages', $thread->messages, 'message')

        @include('pages.messenger.partials.form-message')
    </div>
@stop
