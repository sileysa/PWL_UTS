<?php

namespace App\Filament\Resources\UserPOS;

use App\Filament\Resources\UserPOS\Pages\CreateUserPOS;
use App\Filament\Resources\UserPOS\Pages\EditUserPOS;
use App\Filament\Resources\UserPOS\Pages\ListUserPOS;
use App\Filament\Resources\UserPOS\Schemas\UserPOSForm;
use App\Filament\Resources\UserPOS\Tables\UserPOSTable;
use App\Models\UserPOS;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserPOSResource extends Resource
{
    protected static ?string $model = UserPOS::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return UserPOSForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserPOSTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserPOS::route('/'),
            'create' => CreateUserPOS::route('/create'),
            'edit' => EditUserPOS::route('/{record}/edit'),
        ];
    }
}
