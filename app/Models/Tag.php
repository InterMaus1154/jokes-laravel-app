<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Database\Factories\TagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @property int $tag_id
 * @property int $user_id
 * @property string $tag_name
 * @property string $tag_color
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTagColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTagName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JokeTag> $jokeTags
 * @property-read int|null $joke_tags_count
 * @property-read \App\Models\User $user
 * @mixin \Eloquent
 */
class Tag extends Model
{
    use HasFactory;

    protected $primaryKey = 'tag_id';
    protected $guarded = ['tag_id'];

    protected $table = 'tags';

    /**
     * A tag has one author (user)
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }

    /**
     * One tag has many JokeTags
     */
    public function jokeTags(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JokeTag::class, 'tag_id', 'tag_id');
    }
}
