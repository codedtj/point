<?php

namespace App\Nova\Actions;

use App\Services\ConsignmentNote\ConsignmentNoteService;
use Core\Domain\Enum\ConsignmentNoteStatus;
use Core\Infrastructure\Persistence\Models\ConsignmentNote;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class CompleteConsignmentNote extends Action
{
    use InteractsWithQueue, Queueable;

    public function __construct(private readonly ConsignmentNoteService $consignmentNoteService)
    {
    }

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

            $this->consignmentNoteService->processCompletedConsignmentNote($model);
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
