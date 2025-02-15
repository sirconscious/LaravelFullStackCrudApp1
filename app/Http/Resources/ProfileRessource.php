<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $values = parent::toArray($request);
        $values["password"] = $this->password ; 
        $values["image"] = url( "storage/".$this->image);
        $values["mehdi"]  = null;
         return $values ;
    } 
    public static function collection($resource)
    {
        
        return parent::collection($resource)->additional([
            "count" => $resource->count()
        ]) ;
    }


}
