<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Section
 *
 * @property int $id
 * @property int|null $sectionable_id
 * @property string|null $sectionable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $content
 * @property string|null $title
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Section> $sections
 * @property-read int|null $sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereSectionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereSectionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Section extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'sections';

    protected $casts = [
        'sectionable_id' => 'int',
    ];

    protected $fillable = [
        'sectionable_id',
        'sectionable_type',
        'content',
        'title',
    ];

    public function sections()
    {
        return $this->morphMany(Section::class, 'sectionable');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width('200')->nonQueued();
    }
}
