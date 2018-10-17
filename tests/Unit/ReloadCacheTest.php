<?php

namespace Tests\Unit;

use Tests\TestCase;

class ReloadCacheTest extends TestCase
{
    /** @test */
    public function it_has_reload_cache_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\ReloadCacheCommand::class));
    }

    /** @test */
    public function it_can_reload_caches()
    {
        $this->artisan('reload:cache')
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
            ->assertExitCode(0);
    }
}
