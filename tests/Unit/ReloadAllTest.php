<?php

namespace Tests\Unit;

use Tests\TestCase;

class ReloadAllTest extends TestCase
{
    /** @test */
    public function it_has_reload_all_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\ReloadAllCommand::class));
    }

    /** @test */
    public function it_can_reload_all()
    {
        $this->artisan('reload:all')
            ->expectsOutput('Compiled views cleared!')
            ->expectsOutput('Route cache cleared!')
            ->expectsOutput('Compiled views cleared!')
            ->expectsOutput('Application cache cleared!')
            ->expectsOutput('Route cache cleared!')
            ->expectsOutput('Configuration cache cleared!')
            ->expectsOutput('Compiled services and packages files removed!')
            ->expectsOutput('Caches cleared successfully!')
            ->expectsOutput('Configuration cache cleared!')
            ->expectsOutput('Configuration cached successfully!')
            ->expectsOutput('Successfully reload caches.')
            ->expectsOutput('Dropped all tables successfully.')
            ->expectsOutput('Migration table created successfully.')
            ->expectsOutput('Migrating: 2014_10_12_000000_create_users_table')
            ->expectsOutput('Migrated:  2014_10_12_000000_create_users_table')
            ->expectsOutput('Migrating: 2014_10_12_100000_create_password_resets_table')
            ->expectsOutput('Migrated:  2014_10_12_100000_create_password_resets_table')
            ->expectsOutput('Database seeding completed successfully.')
            ->expectsOutput('Successfully reload database.')
            ->expectsOutput('Successfully reload caches and database.')
            ->assertExitCode(0);
    }
}
