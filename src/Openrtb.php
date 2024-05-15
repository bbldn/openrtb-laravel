<?php

namespace BBLDN\OpenRTPLaravel;

use BBLDN\OpenRTPLaravel\Request\Request;
use Spatie\LaravelData\Data as LaravelData;
use BBLDN\OpenRTPLaravel\Response\Response;

/**
 * @see https://github.com/InteractiveAdvertisingBureau/openrtb/blob/main/OpenRTB%20v3.0%20FINAL.md#object--openrtb-
 */
class Openrtb extends LaravelData
{
    /**
     * @param string|null $ver Version of the Layer-3 OpenRTB specification (e.g., "3.0").
     * @param string $domainver Specification version of the Layer-4 domain model referenced in the domainspec attribute.
     * @param Request|null $request Bid request container. * Required only for request payloads. Refer to Object: Request.
     * @param Response|null $response Bid response container. * Required only for response payloads. Refer to Object: Response.
     * @param string|null $domainspec Identifier of the Layer-4 domain model used to define items for sale, media associated with bids, etc.
     */
    public function __construct(
        public string $domainver = '1.0',
        public string|null $ver = '3.0',
        public Request|null $request = null,
        public Response|null $response = null,
        public string|null $domainspec = 'adcom',
    ) {
    }
}
