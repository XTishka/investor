<?php

namespace App\Http\Traits;

use App\Models\Round;
use Carbon\Carbon;

trait StockholdersTableTrait
{
    public function table($stockholders, $maxPriority)
    {
        ob_start(); ?>

        <?php foreach ($stockholders as $stockholder) : ?>
            <tr>
                <td>
                    <span style="display:inline-block; width: 35px;">
                        <?= $stockholder->priority ?>
                    </span>
                    <div class="btn-group ml-2">
                        <button type="button" class="btn btn-sm btn-default priority-up {{ $stockholder->priority > 1 ? '' : 'disabled' }}" data-user_id="{{ $stockholder->id }}" data-round_id="{{ $stockholder->round_id }}">
                            <i class="fas fa-arrow-up"></i>
                        </button>

                        <button type="button" class="btn btn-sm btn-default priority-down {{ $stockholder->priority < $maxPriority ? '' : 'disabled' }}" data-user_id="{{ $stockholder->id }}" data-round_id="{{ $stockholder->round_id }}">
                            <i class="fas fa-arrow-down"></i>
                        </button>
                    </div>
                </td>
                <td><?= $stockholder->name ?></td>
                <td>
                    <a href="mailto:{{ $stockholder->email }}">
                        <?= $stockholder->email ?>
                    </a>
                </td>
                <td class="text-center">
                    {{ $stockholder->available_weeks }}
                </td>
                <td>

                    <div class="btn-group float-right">

                        <a href="{{ route('stockholders.show', $stockholder->id) }}" class="btn btn-sm btn-default">
                            <i class="fa fa-eye mr-1"></i>
                            Info
                        </a>
                        <a href="{{ route('stockholders.edit', $stockholder->id) }}" class="btn btn-sm btn-default">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>


                        <button class="btn btn-sm btn-default" type="submit" form="stockholder-delete-{{ $stockholder->id }}" onclick="return confirm('{{ __('Are you sure?') }}')">
                            <i class="fas fa-trash mr-1"></i>
                            Delete
                        </button>

                    </div>

                    <form id="stockholder-delete-{{ $stockholder->id }}" action="{{ route('stockholders.destroy', $stockholder->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>

<?php $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }
}
