@extends("templates.".config("sysconfig.theme").".master")
@section('head')
@stop
@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>URL</th>
            <th>Method</th>
            <th>Parameters</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ApiDocumentation as $ApiDocumentationItem)
        <tr>
            <th scope="row">{{ $ApiDocumentationItem->id }}</th>
            <td>
                <code>
                    {{ $ApiDocumentationItem->url }}
                </code>
            </td>
            <td>{{ $ApiDocumentationItem->method_type }}</td>
            <td>{{ $ApiDocumentationItem->parameters }}</td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
@stop