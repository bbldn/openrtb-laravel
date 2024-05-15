<?php

namespace BBLDN\OpenRTPLaravel\Response;

use Spatie\LaravelData\Data as LaravelData;

/**
 * @see https://github.com/InteractiveAdvertisingBureau/openrtb/blob/main/OpenRTB%20v3.0%20FINAL.md#object--seatbid-
 */
class Seatbid extends LaravelData
{
    /**
     * @param mixed $ext Optional demand source specific extensions.
     * @param list<Bid> $bid Array of 1+ Bid objects each related to an item. Multiple bids can relate to the same item. Refer to Object: Bid.
     * @param int|null $package For offers with multiple items, this flag Indicates if the bidder is willing to accept wins on a subset of bids or requires the full group as a package, where 0 = individual wins accepted; 1 = package win or loss only.
     * @param string|null $seat ID of the buyer seat on whose behalf this bid is made.
     */
    public function __construct(
        public array $bid,
        public int|null $package = 0,
        public string|null $seat = null,
        public mixed $ext = null,
    ) {
    }
}
