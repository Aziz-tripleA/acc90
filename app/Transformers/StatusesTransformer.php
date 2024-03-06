<?php

namespace App\Transformers;

use App\Models\Status;
use League\Fractal\TransformerAbstract;

class StatusesTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param Status $status
     * @return array
     */
    public function transform(Status $status): array
    {
        return [
            'id' => $status->id,
            'status' => $status->status,
            'color' => $status->color,
            'country' => $status->country
        ];
    }
}
