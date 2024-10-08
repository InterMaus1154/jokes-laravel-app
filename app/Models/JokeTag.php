<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Database\Factories\JokeTagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag query()
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag whereUpdatedAt($value)
 * @property int $joke_tag_id
 * @property int $joke_id
 * @property int $tag_id
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag whereJokeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag whereJokeTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JokeTag whereTagId($value)
 * @property-read \App\Models\Joke $joke
 * @property-read \App\Models\Tag $tag
 * @mixin \Eloquent
 */
class JokeTag extends Model
{
    use HasFactory;
    protected $primaryKey = 'joke_tag_id';
    protected $guarded = ['joke_tag_id'];
    protected $table = 'joke_tags';

    /**
     * A JokeTag belongs to one joke
     */
    public function joke(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Joke::class, 'joke_id', 'joke_id');
    }

    /**
     * A JokeTag belongs to one tag
     */
    public function tag(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'tag_id');
    }
}
