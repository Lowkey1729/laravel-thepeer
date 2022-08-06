<?php
/**
 * ThePeer Setting & APIs Credentials
 * Created by Olarewaju Mojeed <olarewajumojeed9@gmail.com>.
 */

return [
    'mode' => env('THE_PEER_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'public_key' => env('THE_PEER_TEST_PUBLIC_KEY', ''),
        'secret_key' => env('THE_PEER_TEST_SECRET_KEY', ''),
    ],
    'live' => [
        'public_key' => env('THE_PEER_LIVE_PUBLIC_KEY', ''),
        'secret_key' => env('THE_PEER_LIVE_SECRET_KEY', ''),
    ],

];