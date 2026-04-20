<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\Customers\CustomerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageCustomers extends ManageRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'male' => Tab::make('Male')->modifyQueryUsing(fn (Builder $query) => $query->where('gender', 'male')),
            'female' => Tab::make('Female')->modifyQueryUsing(fn (Builder $query) => $query->where('gender', 'female'))
        ];
    }
}
