@props([
    'statePath' => null,
    'schemaKey' => null,
])

<x-filament-tiptap-editor::button
    action="$wire.mountAction('filament_tiptap_grid', {}, { schemaComponent: '{{ $schemaKey ?? $statePath }}' })"
    active="grid-builder"
    label="{{ trans('filament-tiptap-editor::editor.grid-builder.label') }}"
    icon="grid-builder"
/>
