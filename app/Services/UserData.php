<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Stringable;

class UserData implements Stringable
{
    public readonly int $id;

    public readonly string $username;

    public readonly string $email;

    public readonly ?string $emailVerifiedAt;

    public readonly ?string $nameFirst;

    public readonly ?string $nameSecond;

    public readonly ?string $nameLast;

    public readonly string $nameDisplay;

    public readonly ?string $phone;

    public readonly ?string $phonePrefix;

    public readonly ?string $phoneFull;

    public readonly string $locale;

    public readonly string $createdAt;

    public readonly string $updatedAt;

    public function __construct(private User $user)
    {
        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->emailVerifiedAt = $user->email_verified_at;
        $this->nameFirst = $user->name_first;
        $this->nameSecond = $user->name_second;
        $this->nameLast = $user->name_last;
        $this->phone = $user->phone;
        $this->phonePrefix = $user->phone_prefix;
        $this->locale = $user->locale;
        $this->createdAt = $user->created_at;
        $this->updatedAt = $user->updated_at;

        $this->normalize();
    }

    private function normalize(): void
    {
        $this->nameDisplay = str_replace(
            ['<nameFirst>', '<nameSecond>', '<nameLast>', '<username>'],
            [$this->nameFirst, $this->nameSecond, $this->nameLast, $this->username],
            $this->user->name_display
        );

        $this->phoneFull = $this->phone ? trim("{$this->phonePrefix} {$this->phone}") : null;
    }

    /**
     * Convert the data to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this);
    }
}
