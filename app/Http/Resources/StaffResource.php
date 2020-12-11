<?php

namespace App\Http\Resources;

use http\Env;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
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
            'Name' => $this->name,
            // 'email' => $this->email,
            'Id_no' => $this->matric_no,
            'Signature_pic' => \env('APP_URL').'/'.$this->signature,
            'Profilepix' => \env('APP_URL').'/'.$this->image,
            'NextofKin' => $this->kin,
            'NextofKinAddr' => $this->address,
            'Designation' => $this->designation,
            'Dept' => $this->department->name

        ];
    }
}