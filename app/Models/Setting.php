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

    public function getWhatsappNumber(): ?string
    {
        $phone = $this->phone ?: $this->phone1 ?: $this->phone2;
        if (!$phone) {
            return null;
        }

        $digits = preg_replace('/\D+/', '', $phone);
        if ($digits === '') {
            return null;
        }

        if (str_starts_with($digits, '0')) {
            $digits = '250'.substr($digits, 1);
        }

        return $digits;
    }

    public function getWhatsappUrl(): ?string
    {
        $number = $this->getWhatsappNumber();

        return $number ? 'https://wa.me/'.$number : null;
    }
}
