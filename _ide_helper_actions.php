<?php

namespace App\Actions\Province;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\Data\ProvinceData $province)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\Data\ProvinceData $province)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\Data\ProvinceData $province)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\Data\ProvinceData $province)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\Data\ProvinceData $province)
 * @method static dispatchSync(\App\Data\ProvinceData $province)
 * @method static dispatchNow(\App\Data\ProvinceData $province)
 * @method static dispatchAfterResponse(\App\Data\ProvinceData $province)
 * @method static mixed run(\App\Data\ProvinceData $province)
 */
class CreateProvince
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob()
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob()
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch()
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean)
 * @method static dispatchSync()
 * @method static dispatchNow()
 * @method static dispatchAfterResponse()
 * @method static mixed run()
 */
class GetProvinces
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