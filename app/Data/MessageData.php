<?php

namespace App\Data;

use App\Models\Message;
use Spatie\LaravelData\Data;

class MessageData extends Data
{
     public function __construct(
        public ?int $id,
        public string $client_name,
        public string  $message,
        public string  $email,
        public string  $contact,
        public ?string $date_time,
        public ?string $broker,
        public ?string $property_url
     ){}



     public static  function fromModel(Message $message): self
     {

        return new self(
            id: $message->id,
            client_name: $message->client_name,
            message: $message->message,
            email: $message->email,
            contact: $message->contact,
            date_time: $message->date_time?->toIso8601String(),
            broker: $message->broker?->name ?? null,
            property_url: $message->property?->slug ?? null
        );
     }
}
