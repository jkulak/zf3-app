@extends('layout')

@section('content')
<pre>
    <a href="/cards">Back to the list</a>
</pre>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h1>{{ $card->title }}</h1>

            <h3>Add new note</h3>
            <!-- <pre>{{ var_dump($errors) }}</pre> -->
            @if (count($errors))
                <div>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
            @endif
            <form action="/cards/{{ $card->id }}/notes" method="post">
                <div class="form-group">
                    <label for="note_body">Note</label>
                    <textarea name="body" id="note_body" class="form-control">{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add note</button>
                </div>
                {{ csrf_field() }}

            </form>

            <hr>

            <ul class="list-group">
            @foreach ($card->notes->reverse() as $note)
                <li class="list-group-item">
                    {{ $note->body }} (<a href="{{ route('notes_edit', ['note' => $note->id])}}">edit - doesnt work</a>)
                    <a href="{{ $note->user->path() }}" class="pull-right">{{ $note->user->username }}</a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
@stop
