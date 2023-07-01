<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Round;
use DateTimeImmutable;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Date;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use App\Filament\Resources\RoundResource\Pages;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RoundResource\RelationManagers;

class RoundResource extends Resource
{
    protected static ?string $model = Round::class;

    protected static ?string $navigationIcon = 'heroicon-o-refresh';

    protected static ?string $navigationGroup = 'Data';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([


                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('name'))
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                Textarea::make('description')
                                    ->rows(2)
                                    ->label(__('description')),
                            ]),

                        Grid::make(2)
                            ->schema([
                                DatePicker::make('wishes_start_date')
                                    ->label(__('wishes_start_date'))
                                    ->reactive()
                                    ->afterStateUpdated(fn (callable $set) => $set('wishes_end_date', null))
                                    ->required(),

                                DatePicker::make('wishes_end_date')
                                    ->label(__('wishes_end_date'))
                                    ->minDate(fn (callable $get) => $get('wishes_start_date') ?? now())
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                DatePicker::make('start_date')
                                    ->label(__('round_start_date'))
                                    ->reactive()
                                    ->afterStateUpdated(fn (callable $set) => $set('end_date', null))
                                    ->required(),

                                DatePicker::make('end_date')
                                    ->label(__('round_end_date'))
                                    ->minDate(fn (callable $get) => $get('start_date') ?? now())
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('max_wishes')
                                    ->label(__('max_wishes'))
                                    ->numeric()
                                    ->default(1)
                                    ->required(),
                            ])->inlineLabel(),

                        Toggle::make('overlimit')
                            ->label(__('overlimit')),

                        Toggle::make('active')
                            ->label(__('active')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),

                TextColumn::make('name')
                    ->label(__('name'))
                    ->description(function (Round $record) {
                        return ($record->description) ? $record->description : '';
                    })
                    ->sortable()
                    ->searchable(),

                TextColumn::make('wishes_start_date')
                    ->label(__('wishes_period'))
                    ->dateTime('d F Y')
                    ->description(function (Round $record) {
                        $date = Carbon::parse($record->wishes_end_date)->locale(session('language'));
                        return $date->translatedFormat('d F Y');

                        // return $record->wishes_end_date;
                    })
                    ->alignCenter(),

                TextColumn::make('start_date')
                    ->label(__('round_period'))
                    ->dateTime('d F Y')
                    ->description(function (Round $record) {
                        $date = Carbon::parse($record->end_date)->locale(session('language'));
                        return $date->translatedFormat('d F Y');
                    })
                    ->alignCenter(),

                TextColumn::make('max_wishes')
                    ->label(__('max_wishes'))
                    ->alignCenter()
                    ->sortable(),

                IconColumn::make('overlimit')
                    ->alignCenter()
                    ->boolean(),

                IconColumn::make('active')
                    ->alignCenter()
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

                TextColumn::make('updated_at')
                    ->label(__('updated_at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

                TextColumn::make('deleted_at')
                    ->label(__('deleted_at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make()
                        ->after(function (Round $record) {
                            if ($record->active == 1)
                                Round::where('id', '<>', $record->id)
                                    ->update(['active' => 0]);
                        }),
                    DeleteAction::make(),
                    ForceDeleteAction::make(),
                    RestoreAction::make(),
                ]),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRounds::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    protected static function getNavigationLabel(): string
    {
        return __('rounds');
    }

    public static function getLabel(): string
    {
        return __('round');
    }

    public static function getPluralLabel(): string
    {
        return __('rounds');
    }


    protected static function getNavigationGroup(): ?string
    {
        return __('data');
    }
}
