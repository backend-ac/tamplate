@extends('layouts.index')
@section('content')
    <main>
        @foreach($blocks as $block)
            @php($type = $block->type)
            @php($data = $block->content[$locale] ?? $block->content['ru'] ?? [])
            @php($customName = $block->custom_name[$locale] ?? $block->custom_name['ru'] ?? null)
            @includeIf('partials.blocks.' . $type, ['data' => $data, 'customName' => $customName])
        @endforeach
    </main>
@endsection


