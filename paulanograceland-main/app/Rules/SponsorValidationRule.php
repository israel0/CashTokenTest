<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class SponsorValidationRule implements ValidationRule, DataAwareRule
{

    protected $data = [];
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $package = $this->data["package"];
        $sponsorName = $value;
        $sponsorUser = User::where("userName", $sponsorName)->first();
        if ($sponsorUser && $package == $sponsorUser->package) return;
        else $fail("Sponsor does not exist within the selected package");
    }
}
