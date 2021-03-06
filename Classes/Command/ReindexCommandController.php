<?php

/**
 * Reindex the event models.
 */
declare(strict_types=1);

namespace HDNET\Calendarize\Command;

use HDNET\Calendarize\Service\IndexerService;

/**
 * Reindex the event models.
 */
class ReindexCommandController extends AbstractCommandController
{
    /**
     * Run the reindex process.
     */
    public function runCommand()
    {
        $indexer = $this->objectManager->get(IndexerService::class);
        $indexer->reindexAll();
    }
}
