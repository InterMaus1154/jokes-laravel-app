<?php

namespace App\Models;

use App\Helpers\Traits\FormatDateAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static \Database\Factories\JokeCommentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment query()
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereUpdatedAt($value)
 * @property int $joke_comment_id
 * @property int $joke_id
 * @property int $user_id
 * @property string $comment_content
 * @property int $is_visible
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereCommentContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereJokeCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereJokeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeComment whereUserId($value)
 * @property-read \App\Models\Joke $joke
 * @property-read \App\Models\User $user
 * @mixin \Eloquent
 */
class JokeComment extends Model
{
    use HasFactory, FormatDateAttribute;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $primaryKey = 'joke_comment_id';
    protected $guarded = ['joke_comment_id'];

    /**
     * A comment belongs to one author (user)
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * A comment belongs to a joke
     */
    public function joke(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Joke::class, 'joke_id', 'joke_id');
    }
}
