<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public const DEFAULT_DONATE_URL = 'https://faithandlearning.org/projects/alive-passion-ministries/#form-section';

    public function getDonateUrl(): string
    {
        return $this->donate_url ?: self::DEFAULT_DONATE_URL;
    }
}
