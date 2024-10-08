<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property int $user_id
 * @property string $username
 * @property int $is_verified
 * @property string $role
 * @property-read mixed $is_admin
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @property-read bool $is_restricted
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Joke> $jokes
 * @property-read int|null $jokes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JokeComment> $jokeComments
 * @property-read int|null $joke_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JokeRating> $jokeRatings
 * @property-read int|null $joke_ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['user_id'];

    protected $primaryKey = 'user_id';
    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Check if user is admin
     * @return bool is_admin
     */
    public function getIsAdminAttribute(): bool
    {
        return $this->role === UserRole::ADMIN->value;
    }

    /**
     * Check if user is restricted
     * @return bool is_restricted
     * */
    public function getIsRestrictedAttribute(): bool
    {
        return $this->role === UserRole::RESTRICTED->value;
    }

    /**
     * User has many jokes
     * */
    public function jokes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Joke::class, 'user_id', 'user_id');
    }

    /**
     * User can make many ratings
     */
    public function jokeRatings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JokeRating::class, 'user_id', 'user_id');
    }

    /**
     * User can make many tags
     *
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tag::class, 'user_id', 'user_id');
    }

    /**
     * User can make many comments
     */
    public function jokeComments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JokeComment::class, 'user_id', 'user_id');
    }


    public function getRouteKeyName(): string
    {
        return 'username';
    }
}
