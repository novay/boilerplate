<?php

namespace Laravel\Breeze\Traits;

use Illuminate\Support\Facades\Storage;

trait HasProfilePhoto
{
    /**
     * Update the user's profile photo.
     */
    public function updateProfilePhoto(\Illuminate\Http\UploadedFile $photo)
    {
        tap($this->photo, function ($previous) use ($photo) {
            $this->forceFill([
                'photo' => $photo->storePublicly(
                    'profile-photos', ['disk' => $this->profilePhotoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->profilePhotoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     */
    public function deleteProfilePhoto()
    {
        Storage::disk($this->profilePhotoDisk())->delete($this->photo);

        $this->forceFill(['photo' => null])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     */
    public function getPhotoUrlAttribute(): string
    {
        return is_null($this->photo) ? $this->defaultPhotoUrl() : $this->photo;
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     */
    protected function defaultPhotoUrl(): string
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that profile photos should be stored on.
     * Usage: public, s3
     */
    protected function profilePhotoDisk(): string
    {
        return 'public';
    }
}
