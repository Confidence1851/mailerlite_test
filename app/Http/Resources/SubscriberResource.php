<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriberResource extends JsonResource
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
            "DT_RowId" => $this["id"],
            "id" => $this["id"],
            "name" => $this["fields"]["name"],
            "email" => $this["email"],
            "country" => $this["fields"]["country"],
            "subscribe_date" => Carbon::parse($this["subscribed_at"])->format("d/m/Y"),
            "subscribe_time" => Carbon::parse($this["subscribed_at"])->format("H:i:s"),
        ];
    }
}
