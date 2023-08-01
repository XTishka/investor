<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Round;
use App\Repositories\RoundRepository;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Services\WeeksService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DistributionExcelExport;
use App\Models\Property;
use App\Models\Wish;

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
        $service      = new WeeksService;
        $weeks        = $service->roundWeeks($round->start_date, $round->end_date);
        $stockholders = $round->users()->orderBy('priority')->get();
        $wishes       = Wish::query()->where('round_id', $round->id)->get();
        $properties   = Property::all();

        foreach ($stockholders as $stockholder) :
            $stWeeks = $weeks;
            foreach ($stWeeks as $key => $week) :
                foreach ($wishes->where('user_id', $stockholder->id)->where('week_code', $week['code']) as $wish) :
                    $property = $properties->where('id', $wish->property_id)->first();
                    $stWeeks[$key]['wishes'][] = [
                        'property_id'   => $wish->property_id,
                        'property_name' => $property->name,
                        'status'        => $wish->status,
                    ];
                endforeach;
            endforeach;
            $stockholder->weeks = $stWeeks;
         $stockholder->rowspan = $this->getStockholderRowspan($stockholder, $weeks, $wishes);
        endforeach;

        $this->closeModal();
         return Excel::download(new DistributionExcelExport($weeks, $stockholders, $wishes), $this->getFilename());
    }

    public function getFilename()
    {
        return 'distribution_' . now()->timestamp . '.xlsx';
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
