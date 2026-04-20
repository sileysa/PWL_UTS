<?php

namespace App\Filament\Resources\UserPOS\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserPOSForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level_id')
                    ->relationship('level', 'level_id')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
            ]);
    }
}
