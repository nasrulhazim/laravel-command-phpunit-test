<?php

namespace Tests\Unit;

use Tests\TestCase;

class ReloadDbTest extends TestCase
{
    /** @test */
    public function it_has_reload_db_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\ReloadDbCommand::class));
    }

    /** @test */
    public function it_can_reload_db()
    {
        $this->artisan('reload:db')
            ->expectsOutput('Dropped all tables successfully.')
            ->expectsOutput('Migration table created successfully.')
            ->expectsOutput('Migrating: 2014_10_12_000000_create_users_table')
            ->expectsOutput('Migrated:  2014_10_12_000000_create_users_table')
            ->expectsOutput('Migrating: 2014_10_12_100000_create_password_resets_table')
            ->expectsOutput('Migrated:  2014_10_12_100000_create_password_resets_table')
            ->expectsOutput('Database seeding completed successfully.')
            ->expectsOutput('Successfully reload database.')
            ->assertExitCode(0);
    }
}
