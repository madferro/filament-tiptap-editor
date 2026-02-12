@props([
    'statePath' => null,
    'schemaKey' => null,
])

<x-filament-tiptap-editor::button
    action="$wire.mountAction('filament_tiptap_oembed', {}, { schemaComponent: '{{ $schemaKey ?? $statePath }}' })"
    active="oembed"
    label="{{ trans('filament-tiptap-editor::editor.video.oembed') }}"
    icon="oembed"
/>