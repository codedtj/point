<?php

namespace App\Nova;

use App\Enum\ConsignmentNoteStatus;
use App\Enum\ConsignmentNoteType;
use App\Nova\Actions\Export\DownloadExcel;
use Core\Infrastructure\Persistence\Models\ConsignmentNote as ConsignmentNoteModel;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;


class ConsignmentNote extends Resource
{
    public static string $model = ConsignmentNoteModel::class;

    public static $title = 'number';

    public static function label(): string
    {
        return __('Consignment Notes');
    }

    public static function singularLabel(): string
    {
        return __('Consignment Note');
    }

    public static function updateButtonLabel()
    {
        return __('Update Consignment Note');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->hide(),
            Text::make(__('Number'), 'number')
                ->sortable()
                ->rules('required','unique:consignment_notes,number', 'numeric', 'integer'),
            BelongsTo::make(__('Point'), 'point', Point::class)->required()->withoutTrashed(),
            Select::make(__('Type'), 'type')
                ->options(function () {
                    $options = [];

                    foreach (ConsignmentNoteType::cases() as $case) {
                        $options[$case->value] = $this->getTranslation($case->name);
                    }

                    return $options;
                })->rules('required')
                ->displayUsing(function ($value) {
                    return $this->getTranslation(ConsignmentNoteType::from($value)->name);
                }),
            BelongsTo::make(__('Destination Point'), 'destinationPoint', Point::class)
                ->withoutTrashed()
                ->hide()
                ->nullable()
                ->dependsOn(
                    'type',
                    function (BelongsTo $field, NovaRequest $request, FormData $formData) {
                        if ($formData->type === ConsignmentNoteType::Transfer->value) {
                            $field->show()->rules('required');
                        }
                    })
                ->showOnDetail(function (NovaRequest $request, ConsignmentNoteModel $resource) {
                    return $resource->type === ConsignmentNoteType::Transfer;
                }),
            Text::make(__('Counterparty'), 'counterparty')
                ->nullable()
                ->dependsOn(
                    'type',
                    function (Text $field, NovaRequest $request, FormData $formData) {
                        if ($formData->type !== ConsignmentNoteType::Transfer->value) {
                            $field->show();
                        } else {
                            $field->hide();
                        }
                    })
                ->showOnDetail(function (NovaRequest $request, ConsignmentNoteModel $resource) {
                    return $resource->type !== ConsignmentNoteType::Transfer;
                }),
            Select::make(__('Status'), 'status')
                ->displayUsing(function ($value) {
                    return $this->getTranslation(ConsignmentNoteStatus::from($value)->name);
                })
                ->exceptOnForms(),
            BelongsToMany::make(__('Items'), 'items', Item::class)
                ->required()
                ->searchable()
                ->fields(function ($request, $relatedModel) {
                    return [
                        Number::make(__('Quantity'), 'quantity')->rules('required'),
                        Number::make(__('Prime cost'), 'prime_cost')
                            ->min(0)
                            ->default(0)
                            ->rules('required'),
                    ];
                }),
        ];
    }

    private function getTranslation(string $value): string
    {
        return __('Consignment Note ' . $value);
    }

    public function actions(NovaRequest $request): array
    {
        return [
             resolve(Actions\CompleteConsignmentNote::class)
                ->canRun(function ($request, ConsignmentNoteModel $consignmentNote) {
                    return $consignmentNote->status !== ConsignmentNoteStatus::Completed;
                }),
            (new DownloadExcel)->withHeadings()->withoutConfirmation()
        ];
    }
}
