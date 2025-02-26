@extends('web.app')

@section('title')
    @lang('site.discuss') | @parent
@stop

@section('content')
    <div class="row">
        <form class="form-inline mb-3" role="form" action="{{ route('topic.list') }}" method="get">
            <div class="col-auto">
                <label class="sr-only" for="pid">@lang('topic.form.problem_id')</label>
                <input placeholder="@lang('topic.form.problem_id')" name="pid" id="pid" value="{{ request('pid') }}" class="form-control"/>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="uid">@lang('topic.form.user_id')</label>
                <input placeholder="@lang('topic.form.user_id')" name="uid" id="uid" value="{{ request('uid') }}" class="form-control"/>
            </div>
            <input type="submit" value="@lang('topic.form.filter')" class="btn btn-primary">
            <a href="{{ route('topic.create') }}" class="btn btn-info float-right">@lang('topic.form.new_topic')</a>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>@lang('site.table_columns.problem')</th>
            <th>@lang('site.table_columns.title')</th>
            <th>@lang('site.table_columns.user')</th>
            <th>@lang('site.table_columns.date')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topics as $topic)
        <tr>
            <td>@if($topic->contest_id)
                    <a href="{{ route('contest.problem', $topic->contest_id, $topic->problem_id) }}">{{ $topic->showProblemId() }}</a>
                @elseif($topic->problem_id)
                    <a href="{{ route('problem.view', $topic->problem_id) }}">{{ $topic->problem_id }}</a>
                @endif
            </td>
            <td><a href="{{ route('topic.view', ['id' => $topic->id]) }}"> {{ $topic->title() }} </a></td>
            <td><a href="{{ route('user.profile', ['username' => $topic->user->username]) }}">{{ $topic->user->username }}</a></td>
            <td>{{ $topic->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $topics->render() !!}

    @if ( auth()->check() )
    @include('web.topic._compose')
    @endif
@stop

