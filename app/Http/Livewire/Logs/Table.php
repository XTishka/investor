<?php

namespace App\Http\Livewire\Logs;

use App\Exports\LogsExport;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;
use Maatwebsite\Excel\Facades\Excel;

class Table extends Component
{
    use WithPagination;

    public $activity = '';
    public $description = '';

    public function resetFilter()
    {
        $this->reset(['activity', 'description']);
    }

    public function export()
    {
        return Excel::download(new LogsExport($this->getLogs()), $this->getFilename());
    }

    public function render()
    {
        return view('livewire.logs.table', [
            'logs' => $this->getLogsPaginated()
        ]);
    }

    public function getLogsPaginated()
    {
        return Activity::query()
            ->where('log_name', 'like', '%' . $this->activity . '%')
            ->where('description', 'like', '%' . $this->description . '%')
            ->paginate();
    }

    public function getLogs()
    {
        return Activity::query()
            ->where('log_name', 'like', '%' . $this->activity . '%')
            ->where('description', 'like', '%' . $this->description . '%')
            ->get();
    }

    public function getFilename()
    {
        return 'activity_' . now()->timestamp . '.csv';
    }
}
