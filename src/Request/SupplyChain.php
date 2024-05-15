<?php

namespace BBLDN\OpenRTPLaravel\Request;

use Spatie\LaravelData\Data as LaravelData;

/**
 * @see https://github.com/InteractiveAdvertisingBureau/openrtb/blob/main/supplychainobject.md#openrtb-object-supplychain
 */
class SupplyChain extends LaravelData
{
    /**
     * @param mixed $ext Placeholder for advertising-system specific extensions to this object.
     * @param string $ver Version of the supply chain specification in use, in the format of "major.minor". For example, for version 1.0 of the spec, use the string "1.0".
     * @param int|null $complete Flag indicating whether the chain contains all nodes involved in the transaction leading back to the owner of the site, app or other medium of the inventory, where 0 = no, 1 = yes.
     * @param list<SupplyChainNode> $nodes Array of SupplyChainNode objects in the order of the chain. In a complete supply chain, the first node represents the initial advertising system and seller ID involved in the transaction, i.e. the owner of the site, app, or other medium. In an incomplete supply chain, it represents the first known node. The last node represents the entity sending this bid request.
     */
    public function __construct(
        public string $ver,
        public array $nodes,
        public int|null $complete = null,
        public mixed $ext = null,
    ) {
    }
}
