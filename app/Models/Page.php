<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Data\PageData;
use App\Support\Enums\Pages;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Page
 *
 * @property int $id
 * @property string|null $route
 * @property string|null $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read int|null $sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUrl($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property string $content
 * @property string $name
 * @property string $slogan
 * @property string $location
 * @property string $email
 * @property string $facebook
 * @property string $instagram
 * @property string $whatsapp
 * @property string $tiktok
 * @property array $contacts
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContacts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTiktok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereWhatsapp($value)
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @method static \Database\Factories\PageFactory factory($count = null, $state = [])
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @mixin \Eloquent
 */
class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use WithData;

    protected $table = 'pages';

    protected $casts = [
        'contacts' => 'array',
    ];

    protected $fillable = [
        'name',
        'content',
        'slogan',
        'email',
        'location',
        'facebook',
        'instagram',
        'whatsapp',
        'tiktok',
        'contacts',
    ];

    protected $dataClass = PageData::class;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(Pages::HOME)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::IMOVELS)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::ABOUT)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::CONTACT)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::TERMS)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::POLICY)->withResponsiveImages()->singleFile();
        $this->addMediaCollection(Pages::LOGO)->withResponsiveImages()->singleFile();
    }
}
