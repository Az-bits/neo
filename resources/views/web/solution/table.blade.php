<table class="table table-striped">
    <thead>
        <tr>
            <td>@lang('solution.table_headers.id')</td>
            <td>@lang('solution.table_headers.problem')</td>
            <td>@lang('solution.table_headers.user')</td>
            <td>@lang('solution.table_headers.language')</td>
            <td>@lang('solution.table_headers.status')</td>
            <td>@lang('solution.table_headers.time_cost')</td>
            <td>@lang('solution.table_headers.memory_cost')</td>
            <td>@lang('solution.table_headers.time')</td>
            <td>@lang('solution.table_headers.code_length')</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($solutions as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>
                    @if ($s->isContest())
                        <a
                            href="{{ route('contest.problem', ['contest' => $s->contest_id, 'order' => show_order($s->order)]) }}">
                            @if (!app('router')->is('contest.status'))
                                {{ $s->contest_id }} /
                            @endif{{ show_order($s->order) }}
                        </a>
                    @else
                        <a href="{{ route('problem.view', ['problem' => $s->problem_id]) }}">{{ $s->problem_id }}</a>
                    @endif
                </td>
                <td><a
                        href="{{ route('user.profile', ['username' => $s->user->username]) }}">{{ $s->user->username }}</a>
                </td>
                <td>
                    @if (!can_view_code($s))
                        {{ $s->lang() }}
                    @else
                        <a target="_blank"
                            href="{{ route('solution.source', ['solution' => $s->id]) }}">{{ $s->lang() }}</a>
                    @endif
                </td>
                <td>
                    @if ($s->isCompileError())
                        <a target="_blank"
                            href="{{ route('solution.compile', ['solution' => $s->id]) }}">{{ $s->result() }}</a>
                    @elseif($s->isRuntimeError())
                        <a target="_blank"
                            href="{{ route('solution.runtime', ['solution' => $s->id]) }}">{{ $s->result() }}</a>
                    @else
                        {{ $s->result() }}
                    @endif
                </td>
                <td>
                    @if ($s->isPending())
                        -
                    @else
                        {{ $s->time_cost }}ms
                    @endif
                </td>
                <td>
                    @if ($s->isPending())
                        -
                    @else
                        {{ $s->memory_cost }}kb
                    @endif
                </td>
                <td>{{ $s->created_at }}</td>
                <td>{{ $s->code_length }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">{!! $solutions->appends(request()->all())->render() !!}</div>
