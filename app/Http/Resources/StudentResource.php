<?php

namespace App\Http\Resources;

use http\Env;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'matric_no' => $this->matric_no,
            'gender' => $this->gender,
            'blood_group' => $this->blood,
            'signature' => \env('APP_URL').'/'.$this->signature,
            'image' => \env('APP_URL').'/'.$this->image,
            'next_of_kin' => $this->kin,
            'address' => $this->address,
            'programme' => $this->programme,
            'department' => $this->department,
            'faculty' => $this->faculty,
            'level' => $this->level,
            // 'year' => $this->created_at->format('Y'),
        ];
    }
}