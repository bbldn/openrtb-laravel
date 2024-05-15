<?php

namespace BBLDN\OpenRTPLaravel\Request;

use Spatie\LaravelData\Data as LaravelData;

/**
 * @see https://github.com/InteractiveAdvertisingBureau/openrtb/blob/main/OpenRTB%20v3.0%20FINAL.md#object--source-
 */
class Source extends LaravelData
{
    /**
     * @param mixed $ext Optional exchange-specific extensions.
     * @param int|null $ts Timestamp when the request originated at the beginning of the supply chain in Unix format (i.e., milliseconds since the epoch). This value must be held as immutable throughout subsequent intermediaries.
     * @param string|null $ds Digital signature used to authenticate the origin of this request computed by the publisher or its trusted agent from a digest string composed of a set of immutable attributes found in the bid request. Refer to Section "Inventory Authentication" for more details.
     * @param string|null $tid Transaction ID that must be common across all participants throughout the entire supply chain of this transaction. This also applies across all participating exchanges in a header bidding or similar publisher-centric broadcast scenario.
     * @param string|null $cert File name of the certificate (i.e., the public key) used to generate the digital signature in the ds attribute. Refer to Section "Inventory Authentication" for more details.
     * @param string|null $dsmap An ordered list of identifiers that indicates the attributes used to create the digest. This map provides the essential instructions for recreating the digest from the bid request, which is a necessary step in validating the digital signature in the ds attribute. Refer to Section "Inventory Authentication" for more details.
     * @param string|null $digest The full digest string that was signed to produce the digital signature. Refer to Section "Inventory Authentication" for more details. NOTE: This is only intended for debugging purposes as needed. It is not intended for normal Production traffic due to the bandwidth impact.
     * @param string|null $pchain Payment ID chain string containing embedded syntax described in the TAG Payment ID Protocol. NOTE: Authentication features in this Source object combined with the "ads.txt" specification may lead to the deprecation of this attribute.
     * @param SupplyChain|null $schain This object represents both the links in the supply chain as well as an indicator whether or not the supply chain is complete. Details via the SupplyChain object.
     */
    public function __construct(
        public int|null $ts = null,
        public string|null $ds = null,
        public string|null $tid = null,
        public string|null $cert = null,
        public string|null $dsmap = null,
        public string|null $digest = null,
        public string|null $pchain = null,
        public SupplyChain|null $schain = null,
        public mixed $ext = null,
    ) {
    }
}
