@props([
    'statePath' => null,
])

<x-filament-tiptap-editor::button
    action="$wire.mountAction('filament_tiptap_oembed', {}, { schemaComponent: '{{ $statePath }}' })"
    active="oembed"
    label="{{ trans('filament-tiptap-editor::editor.video.oembed') }}"
    icon="oembed"
/>