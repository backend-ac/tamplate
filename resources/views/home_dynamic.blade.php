@extends('layouts.index')
@section('content')
    <main>
        @foreach($blocks as $block)
            @php($type = $block->type)
            @php($data = $block->content[$locale] ?? $block->content['ru'] ?? [])
            @includeIf('partials.blocks.' . $type, ['data' => $data])
        @endforeach
    </main>
@endsection


