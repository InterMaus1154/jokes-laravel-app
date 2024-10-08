<?php

namespace App\Helpers\Traits;

use Carbon\Carbon;

trait FormatDateAttribute{

    protected string $createdAtDateFormat = "YYYY-MM-DD";

    /**
     * Format created at to YYYY-MM-DD
     */
    public function getFormattedCreatedAtAttribute(): string
    {
        return Carbon::parse($this->created_at)->isoFormat($this->createdAtDateFormat);
    }

}
