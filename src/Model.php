<?php

namespace Kayrunm\Qule\Laravel;

use Kayrunm\Qule\Response;
use Illuminate\Support\Str;
use Jenssegers\Model\Model as BaseModel;

class Model extends BaseModel
{
    /**
     * By default, the model will convert your keys to snake_case. Change this
     * property to true to keep them as they're passed in.
     */
    protected $preserveKeys = false;

    /**
     * Create a new model instance from a response from your API.
     */
    public static function fromResponse(Response $response, string $key): self
    {
        return new static(
            (array) $response->toObject()->data->{$key}
        );
    }

    /**
     * Create a new model instance from a response from an edge in your
     * API response. This is used when a collection of resources are
     * return from the API.
     */
    public static function fromEdge(object $edge): self
    {
        return new static(
            (array) $edge->node
        );
    }

    /** @inheritDoc */
    public function setAttribute($key, $value)
    {
        if (! $this->preserveKeys) {
            $key = Str::snake($key);
        }

        parent::setAttribute($key, $value);
    }
}
