<?php

namespace BBLDN\OpenRTPLaravel\Request;

use BBLDN\AdCOMLaravel\Placement\Placement;
use Spatie\LaravelData\Data as LaravelData;

/**
 * @see https://github.com/InteractiveAdvertisingBureau/openrtb/blob/main/OpenRTB%20v3.0%20FINAL.md#object--item-
 */
class Item extends LaravelData
{
    /**
     * @param mixed $ext Optional exchange-specific extensions.
     * @param string $id A unique identifier for this item within the context of the offer (typically starts with "1" and increments).
     * @param int|null $dt Timestamp when the item is expected to be fulfilled (e.g. when a DOOH impression will be displayed) in Unix format (i.e., milliseconds since the epoch).
     * @param int|null $exp Advisory as to the number of seconds that may elapse between auction and fulfilment.
     * @param int|null $qty The quantity of billable events which will be deemed to have occured if this item is purchased. In most cases, this represents impressions. For example, a single display of an ad on a DOOH placement may count as multiple impressions on the basis of expected viewership. In such a case, qty would be greater than 1. Only one of 'qty' or 'qtyflt' may be present.
     * @param int|null $seq If multiple items are offered in the same bid request, the sequence number allows for the coordinated delivery.
     * @param int|null $dlvy Item (e.g., an Ad object) delivery method required, where 0 = either method, 1 = the item must be sent as part of the transaction (e.g., by value in the bid itself, fetched by URL included in the bid), and 2 = an item previously uploaded to the exchange must be referenced by its ID. Note that if an exchange does not supported prior upload, then the default of 0 is effectively the same as 1 since there can be no items to reference.
     * @param Placement $spec Layer-4 domain object structure that provides specifies the item being offered conforming to the specification and version referenced in openrtb.domainspec and openrtb.domainver. For AdCOM v1.x, the objects allowed here are Placement and any objects subordinate to these as specified by AdCOM.
     * @param float|null $flr Minimum bid price for this item expressed in CPM.
     * @param int|null $private Indicator of auction eligibility to seats named in Deal objects, where 0 = all bids are accepted, 1 = bids are restricted to the deals specified and the terms thereof.
     * @param float|null $qtyflt The quantity of billable events which will be deemed to have occured if this item is purchased. This version of the fields exists for cases where the quantity is not expressed as a whole number. For example, a DOOH opportunity may be considered to be 14.2 impressions. Only one of 'qty' or 'qtyflt' may be present.
     * @param string|null $flrcur Currency of the flr attribute specified using ISO-4217 alpha codes.
     * @param list<Deal>|null $deal Array of Deal objects that convey special terms applicable to this item. Refer to Object: Deal.
     * @param list<Metric>|null $metric An array of Metric objects. Refer to Object: Metric.
     */
    public function __construct(
        public string $id,
        public Placement $spec,
        public int|null $qty = 1,
        public int|null $dlvy = 0,
        public int|null $dt = null,
        public int|null $exp = null,
        public int|null $seq = null,
        public int|null $private = 0,
        public float|null $flr = null,
        public array|null $deal = null,
        public array|null $metric = null,
        public float|null $qtyflt = null,
        public string|null $flrcur = 'USD',
        public mixed $ext = null,
    ) {
    }
}
