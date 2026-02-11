# Modifiche necessarie per Filament 4

## 1. Cambiare namespace di Action in tutti i file

In Filament 4, `Action` è stato spostato da `Filament\Forms\Components\Actions\Action` a `Filament\Actions\Action`.

### File da modificare:

#### `src/Actions/MediaAction.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

#### `src/Actions/OEmbedAction.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

#### `src/Actions/EditMediaAction.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

#### `src/Actions/LinkAction.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

#### `src/Actions/GridBuilderAction.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

#### `src/Concerns/HasCustomActions.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

#### `src/Actions/SourceAction.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

#### `src/TiptapEditor.php`
```php
// VECCHIO
use Filament\Forms\Components\Actions\Action;

// NUOVO
use Filament\Actions\Action;
```

## 2. Rimuovere registerListeners() da TiptapEditor.php

Il metodo `registerListeners()` non esiste più in Filament 4. I listeners vengono gestiti automaticamente tramite Livewire events.

### File: `src/TiptapEditor.php`

**RIMUOVERE COMPLETAMENTE** il blocco (circa righe 116-170):

```php
$this->registerListeners([
    'tiptap::setGridBuilderContent' => [
        fn (
            TiptapEditor $component,
            string $statePath,
            array $arguments
        ) => $this->getCustomListener('filament_tiptap_grid', $component, $statePath, $arguments),
    ],
    'tiptap::setSourceContent' => [
        fn (
            TiptapEditor $component,
            string $statePath,
            array $arguments
        ) => $this->getCustomListener('filament_tiptap_source', $component, $statePath, $arguments),
    ],
    'tiptap::setOEmbedContent' => [
        fn (
            TiptapEditor $component,
            string $statePath,
            array $arguments
        ) => $this->getCustomListener('filament_tiptap_oembed', $component, $statePath, $arguments),
    ],
    'tiptap::setLinkContent' => [
        fn (
            TiptapEditor $component,
            string $statePath,
            array $arguments
        ) => $this->getCustomListener('filament_tiptap_link', $component, $statePath, $arguments),
    ],
    'tiptap::setMediaContent' => [
        fn (
            TiptapEditor $component,
            string $statePath,
            array $arguments
        ) => $this->getCustomListener('filament_tiptap_media', $component, $statePath, $arguments),
    ],
    'tiptap::editMediaContent' => [
        fn (
            TiptapEditor $component,
            string $statePath,
            array $arguments
        ) => $this->getCustomListener('filament_tiptap_edit_media', $component, $statePath, $arguments),
    ],
    'tiptap::updateBlock' => [
        fn (
            TiptapEditor $component,
            string $statePath,
            array $arguments
        ) => $this->getCustomListener('updateBlock', $component, $statePath, $arguments),
    ],
]);
```

**LASCIARE SOLO:**
```php
$this->registerActions([
    SourceAction::make(),
    fn (): Action => $this->getOEmbedAction(),
    fn (): Action => $this->getGridBuilderAction(),
    fn (): Action => $this->getLinkAction(),
    fn (): Action => $this->getMediaAction(),
    fn (): Action => $this->getInsertBlockAction(),
    fn (): Action => $this->getUpdateBlockAction(),
    fn (): Action => $this->getEditMediaAction(),
]);
```

## Riepilogo modifiche

### Totale file da modificare: 9

1. `src/Actions/MediaAction.php` - cambia namespace Action
2. `src/Actions/OEmbedAction.php` - cambia namespace Action
3. `src/Actions/EditMediaAction.php` - cambia namespace Action
4. `src/Actions/LinkAction.php` - cambia namespace Action
5. `src/Actions/GridBuilderAction.php` - cambia namespace Action
6. `src/Actions/SourceAction.php` - cambia namespace Action
7. `src/Concerns/HasCustomActions.php` - cambia namespace Action
8. `src/TiptapEditor.php` - cambia namespace Action + rimuovi registerListeners()
9. Verifica altri file che potrebbero usare Action

## Comando per trovare tutti i file che usano il vecchio namespace:

```bash
grep -r "use Filament\\\\Forms\\\\Components\\\\Actions\\\\Action" src/ --include="*.php"
```

## Dopo le modifiche:

1. Committa e pusha su GitHub branch 4.x
2. Nel progetto brhuno-be4 esegui: `composer update madferro/filament-tiptap-editor`
