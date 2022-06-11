<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Priority
 *
 * @property int $id
 * @property int $user_id
 * @property int $round_id
 * @property int|null $priority
 * @property int $available_weeks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Round $round
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Priority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority query()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereAvailableWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereRoundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereUserId($value)
 */
	class Priority extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $name
 * @property string $country
 * @property string $address
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\PropertyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Query\Builder|Property onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Property withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Property withoutTrashed()
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PropertyAvailability
 *
 * @property int $week_id
 * @property int $property_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property $property
 * @property-read \App\Models\Round $round
 * @property-read \App\Models\Week $week
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyAvailability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyAvailability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyAvailability query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyAvailability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyAvailability wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyAvailability whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyAvailability whereWeekId($value)
 */
	class PropertyAvailability extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Round
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $start_round_date
 * @property string $end_wishes_date
 * @property string $end_round_date
 * @property int $max_wishes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Week[] $weeks
 * @property-read int|null $weeks_count
 * @method static \Database\Factories\RoundFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Round newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Round newQuery()
 * @method static \Illuminate\Database\Query\Builder|Round onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Round query()
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereEndRoundDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereEndWishesDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereMaxWishes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereStartRoundDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Round withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Round withoutTrashed()
 */
	class Round extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Query\Builder|Status onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Status withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Status withoutTrashed()
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int $is_admin
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Priority[] $priorities
 * @property-read int|null $priorities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Round[] $rounds
 * @property-read int|null $rounds_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Wish[] $wishes
 * @property-read int|null $wishes_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Week
 *
 * @property int $id
 * @property int $year
 * @property int $number
 * @property int|null $round_id
 * @property string $start_date
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Round|null $round
 * @method static \Database\Factories\WeekFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Week newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Week newQuery()
 * @method static \Illuminate\Database\Query\Builder|Week onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Week query()
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereRoundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Week whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|Week withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Week withoutTrashed()
 */
	class Week extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wish
 *
 * @property int $id
 * @property int $user_id
 * @property int $week_id
 * @property int $property_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Property $property
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Week $week
 * @method static \Database\Factories\WishFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wish newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wish query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wish whereWeekId($value)
 */
	class Wish extends \Eloquent {}
}

