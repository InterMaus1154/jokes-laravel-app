<?php

namespace App\Models;

use App\Helpers\Traits\FormatDateAttribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static \Database\Factories\JokeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Joke newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Joke newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Joke query()
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereUpdatedAt($value)
 * @property int $joke_id
 * @property int $user_id
 * @property string $joke_question
 * @property string $joke_answer
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereJokeAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereJokeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereJokeQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereUserId($value)
 * @property-read \App\Models\User $user
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|Joke whereIsActive($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JokeComment> $jokeComments
 * @property-read int|null $joke_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JokeRating> $jokeRatings
 * @property-read int|null $joke_ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JokeTag> $jokeTags
 * @property-read int|null $joke_tags_count
 * @mixin \Eloquent
 */
class Joke extends Model
{
    use HasFactory, FormatDateAttribute;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->createdAtDateFormat = "YYYY-MM-DD";
    }

    public static int $PAGINATION_COUNT = 15;

    protected $primaryKey = 'joke_id';
    protected $guarded = ['joke_id'];
    protected $table = 'jokes';

    /**
     * Joke belongs to one author (user)
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * A joke has many joke tags
     */
    public function jokeTags(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JokeTag::class, 'joke_id', 'joke_id');
    }

    /**
     * A joke has many comments
     */
    public function jokeComments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JokeComment::class, 'joke_id', 'joke_id');
    }

    /**
     * A joke has many ratings
     */
    public function jokeRatings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JokeRating::class, 'joke_id', 'joke_id');
    }


    /**
     * Get joke by slug
     */
    public function getRouteKeyName(): string
    {
        return 'joke_slug';
    }

}
