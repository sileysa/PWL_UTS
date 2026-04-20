<?php

namespace App\Filament\Resources\UserPOS\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;

class UserPOSForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level_id')
                    ->label('Level')
                    ->options(Level::all()->pluck('level_nama', 'level_id'))
                    ->relationship('level', 'level_id')
                    ->required()
                    ->searchable(),
                TextInput::make('username')
                    ->label('Username')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                TextInput::make('nama')
                    ->label('Nama')
                    ->maxLength(100)
                    ->required(),
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context) => $context === 'create')
                    ->maxLength(255),
            ]);
    }
}
