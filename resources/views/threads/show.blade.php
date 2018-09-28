@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> Posted:
                    {{ $thread->title }}
                </div>

                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>

     <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>

    @if (auth()->check())
     <div class="row justify-content-center">
        <div class="col-md-8 mt-3">

           <form method="POST" action="{{ $thread->path() . '/replies' }}">
                {{ csrf_field() }}
            <div class="form-group">
                <textarea name="body" id="body" class="form-control" placeholder="Have something to say" rows="5"></textarea>   
             </div>

            <button type="submit" class="btn btn-primary">Post</button>
           </form>

        </div>


    </div>
    @else
        <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p> 
    @endif
</div>
@endsection
