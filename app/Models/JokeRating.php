<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Database\Factories\JokeRatingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating query()
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating whereUpdatedAt($value)
 * @property int $joke_rating_id
 * @property int $joke_id
 * @property int $user_id
 * @property string $rating_value
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating whereJokeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating whereJokeRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating whereRatingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeRating whereUserId($value)
 * @property-read \App\Models\Joke $joke
 * @property-read \App\Models\User $user
 * @mixin \Eloquent
 */
class JokeRating extends Model
{
    use HasFactory;
    protected $primaryKey = 'joke_rating_id';
    protected $guarded = ['joke_rating_id'];
    protected $table = 'joke_ratings';

    /**
     * A rating has one author (user)
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * A rating belongs to one joke
     */
    public function joke(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Joke::class, 'joke_id', 'joke_id');
    }
}
