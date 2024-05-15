<?php

namespace BBLDN\OpenRTPLaravel\Request;

use BBLDN\AdCOMLaravel\Context\Context;
use Spatie\LaravelData\Data as LaravelData;

/**
 * @see https://github.com/InteractiveAdvertisingBureau/openrtb/blob/main/OpenRTB%20v3.0%20FINAL.md#object--request-
 */
class Request extends LaravelData
{
    /**
     * @param mixed $ext Optional exchange-specific extensions.
     * @param string $id Unique ID of the bid request; provided by the exchange.
     * @param int|null $at Auction type, where 1 = First Price, 2 = Second Price Plus. Values greater than 500 can be used for exchange-specific auction types.
     * @param int|null $test Indicator of test mode in which auctions are not billable, where 0 = live mode, 1 = test mode.
     * @param int|null $tmax Maximum time in milliseconds the exchange allows for bids to be received including Internet latency to avoid timeout. This value supersedes any general guidance from the exchange. If an exchange acts as an intermediary, it should decrease the outbound tmax value from what it received to account for its latency and the additional internet hop.
     * @param int|null $wseat Flag that determines the restriction interpretation of the seat array, where 0 = block list, 1 = allow list.
     * @param list<Item> $item Array of Item objects (at least one) that constitute the set of goods being offered for sale. Refer to Object: Item.
     * @param int|null $package Flag to indicate if the Exchange can verify that the items offered represent all of the items available in context (e.g., all impressions on a web page, all video spots such as pre/mid/post roll) to support road-blocking, where 0 = no, 1 = yes.
     * @param list<string> $cur Array of accepted currencies for bids on this bid request using ISO-4217 alpha codes. Recommended if the exchange accepts multiple currencies. If omitted, the single currency of “USD” is assumed.
     * @param string|null $cdata Allows bidder to retrieve data set on its behalf in the exchange’s cookie (refer to cdata in Object: Response) if supported by the exchange. The string must be in base85 cookie-safe characters.
     * @param Source|null $source A Source object that provides data about the inventory source and which entity makes the final decision. Refer to Object: Source.
     * @param Context|null $context Layer-4 domain object structure that provides context for the items being offered conforming to the specification and version referenced in openrtb.domainspec and openrtb.domainver. For AdCOM v1.x, the objects allowed here all of which are optional are one of the DistributionChannel subtypes (i.e., Site, App, or Dooh), User, Device, Regs, Restrictions, and any objects subordinate to these as specified by AdCOM.
     * @param null|list<string> $seat Restriction list of buyer seats for bidding on this item. Knowledge of buyer’s customers and their seat IDs must be coordinated between parties beforehand. Omission implies no restrictions.
     */
    public function __construct(
        public string $id,
        public array $item,
        public int|null $at = 2,
        public int|null $test = 0,
        public int|null $wseat = 1,
        public int|null $tmax = null,
        public array|null $seat = null,
        public int|null $package = null,
        public array|null $cur = ['USD'],
        public string|null $cdata = null,
        public Source|null $source = null,
        public Context|null $context = null,
        public mixed $ext = null,
    ) {
    }
}
