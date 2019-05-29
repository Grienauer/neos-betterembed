<?php
namespace Ds\BetterEmbed\Command;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Ds\BetterEmbed\Service\EmbedService;

/**
 *
 * @Flow\Scope("singleton")
 */
class BetterCommandController extends CommandController
{

    /**
     * @Flow\Inject
     * @var EmbedService
     */
    protected $embedService;

    /**
     * @param string $url
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Neos\ContentRepository\Exception\NodeTypeNotFoundException
     */
    public function embedCommand(string $url ) {

        /** @var NodeInterface $node */
        $node = $this->embedService->getByUrl($url);

        $this->outputLine(json_encode($node->getProperties()));
    }
}
