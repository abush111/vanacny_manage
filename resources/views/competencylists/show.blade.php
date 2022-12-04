@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Competencylist' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('competencylists.competencylist.destroy', $competencylist->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('competencylists.competencylist.index') }}" class="btn btn-primary" title="Show All Competencylist">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('competencylists.competencylist.create') }}" class="btn btn-success" title="Create New Competencylist">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('competencylists.competencylist.edit', $competencylist->id ) }}" class="btn btn-primary" title="Edit Competencylist">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Competencylist" onclick="return confirm(&quot;Click Ok to delete Competencylist.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ __('setting.competency_listname') }}</dt>
            <dd>{{ $competencylist->competency_list_name }}</dd>
            <dt>{{ __('setting.competency_listdesc') }}</dt>
            <dd>{{ $competencylist->comperency_description }}</dd>
            <dt>{{ __('setting.competency') }}</dt>
            <dd>{{ optional($competencylist->competency)->id }}</dd>

        </dl>

    </div>
</div>

@endsection
