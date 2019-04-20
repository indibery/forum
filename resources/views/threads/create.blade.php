@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a New Thread</div>

                <div class="card-body">
                    <form method="POST" action="/threads">
                        @csrf
                        <div class="form-group">
                            <label for="channel">Choose a Channel:</label>
                            <select name="channel_id" id="channel_id" class="form-controll" required>
                                <option value="">Choose One...</option>
                                @foreach(App\Channel::all() as $channel)
                                <option value="{{ $channel->id }}" 
                                    {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="body">Body:</label>
                            <textarea name="body" id="body" rows="8" class="form-control" required>{{ old('body') }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Publish</button>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection