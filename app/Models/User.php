<?php

namespace App\Models;

use App\Data\UserData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;
use Kalnoy\Nestedset\NodeTrait;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $contacto
 * @property string|null $location
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by_id
 * @property int $active
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Agenda> $agendas
 * @property-read int|null $agendas_count
 * @property-read \Kalnoy\Nestedset\Collection<int, User> $children
 * @property-read int|null $children_count
 * @property-read User|null $createdBy
 * @property-read \Kalnoy\Nestedset\Collection<int, User> $createdUsers
 * @property-read int|null $created_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Imovel> $imovels
 * @property-read int|null $imovels_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read User|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $receivedMessages
 * @property-read int|null $received_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $sentMessages
 * @property-read int|null $sent_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Kalnoy\Nestedset\Collection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|User descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User permission($permissions)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User role($roles, $guard = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereActive($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereContacto($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereCreatedById($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereEmail($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereEmailVerifiedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereLocation($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User wherePassword($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereRememberToken($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|User withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|User withoutRoot()
 * @mixin \Eloquent
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,InteractsWithMedia;
    use WithData;
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contacto',
        'location',
        'active',
        'created_by_id',
    ];

    protected $dataClass = UserData::class;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'corretor_id');
    }

    public function imovels()
    {
        return $this->hasMany(Imovel::class, 'corretor_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'to_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'from_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width('200')->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')->withResponsiveImages()->singleFile();
    }

    public static function last()
    {
        return static::all()->last();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function createdUsers()
    {
        return $this->hasMany(User::class, 'created_by_id');
    }
}
