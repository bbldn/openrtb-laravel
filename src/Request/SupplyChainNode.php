<?php

namespace BBLDN\OpenRTPLaravel\Request;

use Spatie\LaravelData\Data as LaravelData;

/**
 * @see https://github.com/InteractiveAdvertisingBureau/openrtb/blob/main/supplychainobject.md#openrtb-object-supplychainnode
 */
class SupplyChainNode extends LaravelData
{
    /**
     * @param int $hp Indicates whether this node will be involved in the flow of payment for the inventory. When set to 1, the advertising system in the asi field pays the seller in the sid field, who is responsible for paying the previous node in the chain. When set to 0, this node is not involved in the flow of payment for the inventory. For version 1.0 of SupplyChain, this property should always be 1. It is explicitly required to be included as it is expected that future versions of the specification will introduce non-payment handling nodes. Implementers should ensure that they support this field and propagate it onwards when constructing SupplyChain objects in bid requests sent to a downstream advertising system.
     * @param mixed $ext Placeholder for advertising-system specific extensions to this object.
     * @param string $asi The canonical domain name of the SSP, Exchange, Header Wrapper, etc system that bidders connect to. This may be the operational domain of the system, if that is different than the parent corporate domain, to facilitate WHOIS and reverse IP lookups to establish clear ownership of the delegate system. This should be the same value as used to identify sellers in an ads.txt file if one exists.
     * @param string $sid The identifier associated with the seller or reseller account within the advertising system. This must contain the same value used in transactions (i.e. OpenRTB bid requests) in the field specified by the SSP/exchange. Typically, in OpenRTB, this is publisher.id. For OpenDirect it is typically the publisher’s organization ID.Should be limited to 64 characters in length.
     * @param string|null $rid The OpenRTB RequestId of the request as issued by this seller.
     * @param string|null $name The name of the company (the legal entity) that is paid for inventory transacted under the given seller_id. This value is optional and should NOT be included if it exists in the advertising system’s sellers.json file.
     * @param string|null $domain The business domain name of the entity represented by this node. This value is optional and should NOT be included if it exists in the advertising system’s sellers.json file.
     */
    public function __construct(
        public int $hp,
        public string $asi,
        public string $sid,
        public string|null $rid = null,
        public string|null $name = null,
        public string|null $domain = null,
        public mixed $ext = null,
    ) {
    }
}
