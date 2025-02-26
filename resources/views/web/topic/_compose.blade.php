@if(auth()->user())
<form class="form-horizontal" role="form" method="post" action="{{ route('topic.store') }}">
    <div class="form-group">
        <label for="title" class="col-sm-1">{{ __('topic.form.title') }}</label>
        {{csrf_field()}}
        <div class="col-sm-4">
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="problem" class="col-sm-1">{{ __('topic.form.problem') }}</label>
        <div class="col-sm-4">
            @if(isset($contest))
                <input name="contest_id" type="hidden" value="{{ $contest->id }}"/>
                <select name="problem" id="problem" class="form-control">
                    @foreach($contest->problems as $problem)
                        <option value="{{ $problem->pivot->order }}">{{ $problem->order() }} : {{ $problem->title }}</option>
                    @endforeach
                </select>
            @else
                <input type="text" id="problem" name="problem" class="form-control" value="0">
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="content" class="col-sm-1">{{ __('topic.form.content') }}</label>

        <div class="col-sm-8">
            <textarea id="content" name="content" class="form-control" rows="6" minlength="10" required></textarea>
        </div>
    </div>

    <div class="from-group">
        <div class="col-sm-8 col-sm-offset-1">
            <button type="submit" class="btn btn-primary">{{ __('topic.form.add') }}</button>
        </div>
    </div>
</form>
@endif
