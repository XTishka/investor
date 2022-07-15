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