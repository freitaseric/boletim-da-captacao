<?php

namespace Tests\Feature\Infrastructure;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PostgreSqlConnectionTest extends TestCase
{
    public function test_application_connects_to_postgresql(): void
    {
        $connection = DB::connection();

        $this->assertSame('pgsql', $connection->getDriverName());

        $result = $connection->selectOne(
            'select current_database() as database, version() as version'
        );

        $this->assertNotEmpty($result->database);
        $this->assertStringContainsString('PostgreSQL', $result->version);
    }
}
