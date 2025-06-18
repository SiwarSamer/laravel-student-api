<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this ->id,
            'name'=>$this ->name,
            'email'=> $this->email,
            'country_name'=>$this->country->name ?? null,
            'course_names'=>$this->courses->pluck('name'),
            'course_count' => $this->courses->count(),
            'age' => \Carbon\Carbon::parse($this->date_of_birth)->age,
            'phone' => $this->phone,
            'created_at'=>$this->created_at ->toDateTimeString()

        ];
    }
}
