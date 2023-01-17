<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Round;
use App\Repositories\RoundRepository;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Services\WeeksService;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DistributionCsvExport;

class ExportCsv extends Component
{
    public $modal;

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function export(Request $request)
    {
        $round        = $this->getRound($request);
        $weeks        = $this->getWeeks($round);
        $stockholders = $this->getStockholders($round, $weeks);
        $wishes       = $this->getWishes($round);

        $this->closeModal();

        return Excel::download(new DistributionCsvExport($weeks, $stockholders, $wishes), $this->getFilename());
    }

    public function getFilename()
    {
        return 'distribution_' . now()->timestamp . '.csv';
    }

    public function getWishes($round)
    {
        return DB::table('wishes')
            ->join('round_user', 'wishes.user_id', '=', 'round_user.user_id')
            ->join('users', 'round_user.user_id', '=', 'users.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as id',
                'wishes.status as status',
                'wishes.priority as priority',
                'wishes.week_code as week_code',
                'wishes.user_id as user_id',
                'round_user.priority as user_priority',
                'users.name as user_name',
                'wishes.property_id as property_id',
                'properties.name as property_name'
            )
            ->where('wishes.round_id', $round->id)
            ->orderBy('round_user.priority')
            ->get();
    }

    public function getStockholders($round, $weeks)
    {
        $stockholders = $round->users()->orderBy('priority')->get();
        foreach ($stockholders as $stockholder) {
            $stockholder->weeks = $weeks;
        }
        return $stockholders;
    }

    public function getRound($request)
    {
        $roundId = $request->session()->get('active_round');

        if ($roundId == null) :
            $repository = new RoundRepository;
            $round = $repository->getActiveRound();
        else :
            $round = Round::query()->find($roundId);
        endif;

        return $round;
    }

    public function getWeeks($round)
    {
        $service = new WeeksService;
        return $service->roundWeeks($round->start_date, $round->end_date);
    }

    public function render()
    {
        return view('livewire.dashboard.export-csv');
    }
}
