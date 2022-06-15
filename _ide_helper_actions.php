<?php

namespace App\Actions;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\Models\Round $round)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\Models\Round $round)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\Models\Round $round)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\Models\Round $round)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\Models\Round $round)
 * @method static dispatchSync(\App\Models\Round $round)
 * @method static dispatchNow(\App\Models\Round $round)
 * @method static dispatchAfterResponse(\App\Models\Round $round)
 * @method static mixed run(\App\Models\Round $round)
 */
class AutomaticDistributionAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(mixed $round_id, mixed $request)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(mixed $round_id, mixed $request)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(mixed $round_id, mixed $request)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, mixed $round_id, mixed $request)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, mixed $round_id, mixed $request)
 * @method static dispatchSync(mixed $round_id, mixed $request)
 * @method static dispatchNow(mixed $round_id, mixed $request)
 * @method static dispatchAfterResponse(mixed $round_id, mixed $request)
 * @method static mixed run(mixed $round_id, mixed $request)
 */
class GenerateRoundWeeksAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static dispatchSync(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static dispatchNow(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static dispatchAfterResponse(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static mixed run(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 */
class StockholderPriorityDownAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static dispatchSync(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static dispatchNow(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static dispatchAfterResponse(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 * @method static mixed run(\Illuminate\Http\Request $request, \App\Models\User $users, \App\Models\Priority $priorities)
 */
class StockholderPriorityUpAction
{
}
namespace Lorisleiva\Actions\Concerns;

/**
 * @method void asController()
 */
trait AsController
{
}
/**
 * @method void asListener()
 */
trait AsListener
{
}
/**
 * @method void asJob()
 */
trait AsJob
{
}
/**
 * @method void asCommand(\Illuminate\Console\Command $command)
 */
trait AsCommand
{
}