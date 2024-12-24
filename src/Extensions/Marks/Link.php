<?php

namespace FilamentTiptapEditor\Extensions\Marks;

use Tiptap\Marks\Link as BaseLink;

class Link extends BaseLink
{
    public function addOptions(): array
    {
        return [
            'openOnClick' => true,
            'linkOnPaste' => true,
            'autoLink' => true,
            'protocols' => [],
            'HTMLAttributes' => [],
            'validate' => 'undefined',
            'isAllowedUri' => true
        ];
    }

    public function addAttributes(): array
    {
        return [
            'href' => [
                'default' => null,
            ],
            'id' => [
                'default' => null,
            ],
            'target' => [
                'default' => $this->options['HTMLAttributes']['target'] ?? null,
            ],
            'hreflang' => [
                'default' => null,
            ],
            'rel' => [
                'default' => null,
            ],
            'referrerpolicy' => [
                'default' => null,
            ],
            'class' => [
                'default' => null,
            ],
            'as_button' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    if ($DOMNode->getAttribute('as_button') === 'true') {
                        return true;
                    }

                    return $DOMNode->getAttribute('data-as-button') ?: null;
                },
                'renderHTML' => function ($attributes) {
                    if (! property_exists($attributes, 'as_button')) {
                        return null;
                    }

                    return [
                        'data-as-button' => $attributes->as_button ?? null,
                    ];
                },
            ],
            'button_theme' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    if ($theme = $DOMNode->getAttribute('data-as-button-theme')) {
                        return $theme;
                    }

                    if ($theme = $DOMNode->getAttribute('button_theme')) {
                        return $theme;
                    }

                    return null;
                },
                'renderHTML' => function ($attributes) {
                    if (! property_exists($attributes, 'button_theme') || strlen($attributes->button_theme ?? '') === 0) {
                        return null;
                    }

                    return [
                        'data-as-button-theme' => $attributes->button_theme,
                    ];
                },
            ],
            'linktype' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    if ($theme = $DOMNode->getAttribute('data-linktype')) {
                        return $theme;
                    }

                    if ($theme = $DOMNode->getAttribute('linktype')) {
                        return $theme;
                    }

                    return null;
                },
                'renderHTML' => function ($attributes) {
                    if (! property_exists($attributes, 'linktype') || strlen($attributes->linktype ?? '') === 0) {
                        return null;
                    }

                    return [
                        'data-linktype' => $attributes->linktype,
                    ];
                },
            ],
            'resource' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    if ($theme = $DOMNode->getAttribute('data-resource')) {
                        return $theme;
                    }

                    if ($theme = $DOMNode->getAttribute('resource')) {
                        return $theme;
                    }

                    return null;
                },
                'renderHTML' => function ($attributes) {
                    if (! property_exists($attributes, 'resource') || strlen($attributes->resource ?? '') === 0) {
                        return null;
                    }

                    return [
                        'data-resource' => $attributes->resource,
                    ];
                },
            ],
            'internal' => [
                'default' => false,
                'parseHTML' => function ($DOMNode) {
                    if ($DOMNode->getAttribute('internal') === 'true') {
                        return true;
                    }

                    return $DOMNode->getAttribute('data-internal') ?: null;
                },
                'renderHTML' => function ($attributes) {
                    if (! property_exists($attributes, 'internal')) {
                        return null;
                    }

                    return [
                        'data-internal' => $attributes->internal ?? null,
                    ];
                },
            ],
        ];
    }
}
