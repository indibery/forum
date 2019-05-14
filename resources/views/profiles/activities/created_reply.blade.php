@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} 님이
        <a href="{{ $activity->subject->thread->path() }}"> {{ $activity->subject->thread->title }} </a>에 댓글을 작성하였습니다.
    @endslot

    @slot('body')
        <div cl ass="body">{{ $activity->subject->body }}</div>
    @endslot
@endcomponent
