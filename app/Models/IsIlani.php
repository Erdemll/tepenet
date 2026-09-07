<?php

namespace App\Models;

use Database\Factories\IsIlaniFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'slug',
    'title',
    'summary',
    'type',
    'cities',
    'employment_type',
    'application_deadline',
    'is_active',
])]
class IsIlani extends Model
{
    /** @use HasFactory<IsIlaniFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'is_ilanlari';

    public const TYPE_SECURITY_OFFICER = 'security-officer';

    public const TYPE_SECURITY_MANAGER = 'security-manager';

    /**
     * @return array<string, string>
     */
    public static function typeLabels(): array
    {
        return [
            self::TYPE_SECURITY_OFFICER => 'Özel Güvenlik Görevlisi',
            self::TYPE_SECURITY_MANAGER => 'Özel Güvenlik Yöneticisi',
        ];
    }

    public function typeLabel(): string
    {
        return self::typeLabels()[$this->type] ?? $this->type;
    }

    #[Scope]
    protected function active(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'application_deadline' => 'date',
            'cities' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
