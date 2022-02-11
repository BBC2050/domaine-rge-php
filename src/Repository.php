<?php

namespace BBC2050\DomaineRGE;

class Repository
{
    private static function db(): array
    {
        return \json_decode(file_get_contents(__DIR__ . '/../data/domaine.json'), true);
    }

    public static function get(): iterable
    {
        return \array_map(function (array $item) {
            return self::dataTransformer($item);
        }, self::db());
    }

    public static function getOne(string $code): null|Entity
    {
        $results = \array_filter(self::db(), function($item) use ($code) {
            return \array_key_exists('code', $item) && $item['code'] === $code;
        });

        return $results ? self::dataTransformer(\current($results)) : null;
    }

    public static function getBy(string $famille): iterable
    {
        return \array_map(function (array $item) {
            return self::dataTransformer($item);
        }, \array_filter(self::db(), function($item) use ($famille) {
            return \array_key_exists('famille', $item) && $famille === $item['famille'];
        }));
    }

    private static function dataTransformer(array $data): Entity
    {
        return new Entity($data['code'], $data['nom'], $data['famille'] ?? null);
    }
}
