@extends('layouts.index')
@section('content')
    <main>
        @foreach($blocks as $block)
            @php($type = $block->type)
            @php($data = $block->content[$locale] ?? $block->content['ru'] ?? [])
            <section id="{{ $type }}">
                @includeIf('partials.blocks.' . $type, ['data' => $data])
            </section>
        @endforeach
    </main>
@endsection


