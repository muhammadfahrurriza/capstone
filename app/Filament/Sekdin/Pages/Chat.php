<?php

namespace App\Filament\Sekdin\Pages;

use Filament\Pages\Page;

class Chat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.sekdin.pages.chat';

    public function getTitle(): string
    {
        return '';
    }
}
