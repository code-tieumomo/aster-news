<?php
declare(strict_types=1);

use ElasticAdapter\Indices\Mapping;
use ElasticAdapter\Indices\Settings;
use ElasticMigrations\Facades\Index;
use ElasticMigrations\MigrationInterface;

final class CreatePostsIndex implements MigrationInterface
{
    /**
     * Run the migration.
     */
    public function up(): void
    {
        Index::create('posts', function (Mapping $mapping, Settings $settings) {
            $mapping->integer('id');

            $mapping->keyword('title');

            $mapping->text('description', [
                'analyzer' => 'standard',
            ]);

            $mapping->text('content', [
                'analyzer' => 'standard',
            ]);

            $mapping->boolean('is_published');
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Index::drop('posts');
    }
}
