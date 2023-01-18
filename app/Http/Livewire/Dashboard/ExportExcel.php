<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Round;
use App\Repositories\RoundRepository;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Services\WeeksService;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DistributionExcelExport;

class ExportExcel extends Component
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
        $wishes       = $this->getWishes($round);
        $stockholders = $this->getStockholders($round, $weeks, $wishes);

        $this->closeModal();
        return Excel::download(new DistributionExcelExport($weeks, $stockholders, $wishes), $this->getFilename());
    }

    public function getFilename()
    {
        return 'distribution_' . now()->timestamp . '.xlsx';
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

    public function getStockholders($round, $weeks, $wishes)
    {
        $stockholders = $round->users()->orderBy('priority')->get();
        foreach ($stockholders as $stockholder) :
            $stockholder->rowspan = $this->getStockholderRowspan($stockholder, $weeks, $wishes);
        endforeach;
        return $stockholders;
    }

    public function getStockholderRowspan($stockholder, $weeks, $wishes)
    {
        $rowspan = 1;
        foreach ($weeks as $week) :
            $stockholderWishes = $wishes
                ->where('user_id', $stockholder->id)
                ->where('week_code', $week['code'])
                ->count();
            $rowspan = ($stockholderWishes > $rowspan) ? $stockholderWishes : $rowspan;
        endforeach;
        return $rowspan;
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
        return view('livewire.dashboard.export-excel');
    }
}
