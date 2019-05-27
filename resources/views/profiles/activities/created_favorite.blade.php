@component('profiles.activities.activity')
    @slot('heading')
        <a href="{{ $activity->subject->favorited->path() }}">
            {{ $profileUser->name }}
        </a>
        님이 에 좋아요를 작성하였습니다.
            {{-- <a href="{{ $activity->subject->thread->path() }}"> {{ $activity->subject->thread->title }} </a> --}}

    @endslot

    @slot('body')
        <div class="body">{{ $activity->subject->favorited->body }}</div>
    @endslot
@endcomponent
