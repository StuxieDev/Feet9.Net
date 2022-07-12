<?php

declare(strict_types=1);

class Feet9Info extends ExtensionInfo
{
    public const KEY = "Feet9";

    public string $key = self::KEY;
    public string $name = "Feet9 Customisations";
    public string $url = self::SHIMMIE_URL;
    public array $authors = self::SHISH_AUTHOR;
    public string $license = self::LICENSE_GPLV2;
    public string $description = "Extra Feet9 Bits";
    public ?string $documentation = "Probably not much use to other sites, but it gives a few examples of how a shimmie-based site can be integrated with other systems";
    public array $db_support = [DatabaseDriver::PGSQL];  # Only PG has the NOTIFY pubsub system
}
