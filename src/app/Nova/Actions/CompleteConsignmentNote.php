<?php

namespace App\Nova\Actions;

use App\Enum\ConsignmentNoteStatus;
use App\Enum\ConsignmentNoteType;
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

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields $fields
     * @param Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
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
                                'base_price' => 0,
                            ]
                        );

                    $newQuantity = match ($model->type) {
                        ConsignmentNoteType::In => $balance->quantity + $item->pivot->quantity,
                        ConsignmentNoteType::Out, ConsignmentNoteType::Transfer => $balance->quantity - $item->pivot->quantity,
                    };

                    $basePrice = $item->pivot->price > 0 ? $item->pivot->price : $balance->base_price;

                    $balance->update([
                        'quantity' => $newQuantity,
                        'base_price' => $basePrice,
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
