<?php

namespace KMA\IikoApi\Concerns;

use \JsonException;

trait FromJSON
{
    protected array $decoded = [];

    /**
     * Decode json from string
     *
     * @param string $json
     * @param bool $asObject
     * @return array
     *
     * @throws \JsonException
     */
    public function fromJson(string $json, bool $asObject = false): array
    {
        $data = json_decode($json, !$asObject);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonException('Invalid JSON: ' . json_last_error_msg());
        }

        // Mostly for debugging purpose
        $this->decoded = $data;

        return $data;
    }
}
