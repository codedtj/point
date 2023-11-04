<?php

namespace App\Nova\Actions;

use App\Enum\ConsignmentNoteStatus;
use App\Enum\ConsignmentNoteType;
use App\Models\ConsignmentNote;
use App\Models\Price;
use App\Models\StockBalance;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class CompleteConsignmentNote extends Action
{
    use InteractsWithQueue, Queueable;

    public function handle(ActionFields $fields, Collection $models): array
    {
        /** @var ConsignmentNote $model */
        foreach ($models as $model) {
            if ($model->status === ConsignmentNoteStatus::Completed) {
                continue;
            }

            $model->update([
                'status' => ConsignmentNoteStatus::Completed,
            ]);

            //TODO: Move to queue
            foreach ($model->items as $item) {
                DB::transaction(function () use ($item, $model) {
                    /** @var StockBalance $balance */
                    $balance = StockBalance::query()
                        ->firstOrCreate(
                            [
                                'item_id' => $item->id,
                                'point_id' => $model->point_id,
                            ],
                            [
                                'item_id' => $item->id,
                                'point_id' => $model->point_id,
                                'quantity' => 0,
                            ]
                        );

                    $newQuantity = match ($model->type) {
                        ConsignmentNoteType::In => $balance->quantity + $item->pivot->quantity,
                        ConsignmentNoteType::Out, ConsignmentNoteType::Transfer => $balance->quantity - $item->pivot->quantity,
                    };

                    /** @var Price $oldPrice */
                    $oldPrice = Price::query()
                        ->where('item_id', $item->id)
                        ->where('point_id', $model->point_id)
                        ->first();

                    if (!$oldPrice?->manual && $oldPrice?->base !== $item->pivot->price) {
                        Price::query()
                            ->create([
                                'item_id' => $item->id,
                                'point_id' => $model->point_id,
                                'base' => $item->pivot->price,
                            ]);
                    }

                    $balance->update([
                        'quantity' => $newQuantity,
                    ]);
                }, 3);
            }
        }

        return Action::message(__('Consignment note(s) completed!'));
    }

    public function fields(NovaRequest $request): array
    {
        return [];
    }

    public function name(): string
    {
        return __('Complete Consignment Note');
    }
}
