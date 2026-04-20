<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('level_kode')
                    ->label('Kode Level')
                    ->maxLength(10)
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('level_nama')
                    ->label('Nama Level')
                    ->maxLength(100)
                    ->required(),
            ]);
    }
}
