@props([
    'statePath' => null,
])

<x-filament-tiptap-editor::button
    action="$wire.mountAction('filament_tiptap_grid', {}, { schemaComponent: '{{ $statePath }}' })"
    active="grid-builder"
    label="{{ trans('filament-tiptap-editor::editor.grid-builder.label') }}"
    icon="grid-builder"
/>
