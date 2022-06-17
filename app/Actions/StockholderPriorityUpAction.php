<?php

namespace App\Actions;

use App\Models\Priority;
use Barryvdh\Debugbar\Facades\Debugbar;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Traits\StockholdersTableTrait;

class StockholderPriorityUpAction
{
    use AsAction;
    use StockholdersTableTrait;

    public function handle(Request $request, User $users, Priority $priorities)
    {
        // Update user priority
        $maxPriority = $priorities->where('round_id', $request->round_id)->max('priority');
        $stockholderPriority = $priorities->where('user_id', $request->user_id)->where('round_id', $request->round_id)->first();
        if ($stockholderPriority->priority > 1) {
            $priority = $priorities->where('priority', $stockholderPriority->priority - 1)->where('round_id', $request->round_id)->first();
            $priority->priority = $priority->priority + 1;
            $priority->save();

            $stockholderPriority->priority = $stockholderPriority->priority - 1;
            $stockholderPriority->save();
        }

        // Render
        $stockholders = $users->getStockholdersWithPriorityAndRound($request->round_id);
        $priorityUpRoute = route('admin.priority_up');
        $priorityDownRoute = route('admin.priority_down');

        $html = '
        <script>
            $(function () {
                $(".priority-up").click(function() {
                    let $userId = $(this).attr("data-user_id");
                    let $roundId = $(this).attr("data-round_id");
                    console.log($userId);
                    console.log($roundId);
                    $.ajax({
                        url: "' . $priorityUpRoute . '?user_id=" + $userId + "&round_id=" + $roundId,
                        method: "GET",
                        success: function (data) {
                            $("#button_scripts").html(data.html);
                            $("#table-stockholders").load(location.href + " #card-stockholders");
                        }
                    });
                });

                $(".priority-down").click(function() {
                    let $userId = $(this).attr("data-user_id");
                    let $roundId = $(this).attr("data-round_id");
                    console.log($userId);
                    console.log($roundId);
                    $.ajax({
                        url: "' . $priorityDownRoute . '?user_id=" + $userId + "&round_id=" + $roundId,
                        method: "GET",
                        success: function (data) {
                            $("#stockholders-index").html(data.html);
                        }
                    });
                });
            });
        </script>';

        return response()->json(['html' => $html]);;
    }
}
