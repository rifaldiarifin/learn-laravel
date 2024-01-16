<?php

use Ramsey\Uuid\Uuid;

class Uuidv4 {
    public static function generate_v4 () {
        return Uuid::uuid4();
    }
}