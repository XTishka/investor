<?php

namespace App\Actions;

use App\Models\Priority;
use Barryvdh\Debugbar\Facades\Debugbar;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use App\Models\User;

class StockholderPriorityDownAction
{
    use AsAction;

    public function handle(Request $request, User $users, Priority $priorities)
    {
        // Update user priority
        Debugbar::info('Update user ' . $request->user_id . ' priority. Round: ' . $request->round_id);
        $maxPriority = $priorities->where('round_id', $request->round_id)->max('priority');
        $stockholderPriority = $priorities->where('user_id', $request->user_id)->where('round_id', $request->round_id)->first();
        if ( $stockholderPriority->priority < $maxPriority) {
            $priority = $priorities->where('priority', $stockholderPriority->priority + 1)->where('round_id', $request->round_id)->first();
            $priority->priority = $priority->priority - 1;
            $priority->save();

            $stockholderPriority->priority = $stockholderPriority->priority + 1;
            $stockholderPriority->save();
        }

        // Render
        $stockholders = $users->getStockholdersWithPriorityAndRound($request->round_id);
        $html = '';
        

        foreach ($stockholders as $stockholder) {
            $stockholderStatus = ($stockholder->status === 1) ? __('admin.active') : __('admin.deactivated');
            $stockholderStatusBadge = ($stockholder->status === 1) ? 'success' : 'danger';
            $html .= "
            <tr>
                <td>
                    <div class='d-flex justify-content-between align-items-center'>
                        <span>$stockholder->priority</span>
                        <div>";

                        if ($stockholder->priority > 1) {
                            $html .= "
                            <button class='priority-up btn-sm btn-primary mr-2' 
                                data-user_id='$stockholder->id' 
                                data-round_id='$stockholder->round_id'>
                                <i class='fas fa-arrow-up'></i>
                            </button>";
                        }
            
                        if ($stockholder->priority < $maxPriority) {
                            $html .= "
                            <button class='priority-down btn-sm btn-primary' 
                                data-user_id='$stockholder->id' 
                                data-round_id='$stockholder->round_id'>
                                <i class='fas fa-arrow-down'></i>
                            </button>";
                        }
            
            $html .= "
                        </div>
                    </div>
                </td>
                <td>
                    <a href='" . route('stockholders.show', $stockholder->id) . "'>$stockholder->name</a>
                </td>
                <td>$stockholder->email</td>
                <td>
                    $stockholder->available_weeks
                </td>
            </tr>";
        }

        $priorityUpRoute = route('admin.priority_up');
        $priorityDownRoute = route('admin.priority_down');

        $html .= '
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
                            $("#stockholders-index").html(data.html);
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
