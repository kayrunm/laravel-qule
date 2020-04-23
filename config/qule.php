<?php

return [

    /**
     * Define your Qule connections in here. The key is the key you will use
     * to access the connection from the QuleManager class, and the value
     * is the config for the connection's underlying Guzzle client.
     */
    'connections' => [

        /**
         * You will likely want to set a base_uri and any authentication required
         * for the guzzle client here. If your API requires more complex
         * authentication, you can always register the connection manually.
         */
        'default' => [
            // 'base_uri' => 'https://store.myshopify.com/admin/api/2020-01/graphql.json',
            // 'headers' => [
            //     'X-Shopify-Access-Token' => env('SHOPIFY_ACCESS_TOKEN'),
            // ]
        ],

    ],


    /**
     * You can change the default query path and connetion for the QuleManager
     * class here.
     */
    'defaults' => [

        /**
         * This is the path that the query files will be loaded from. By default
         * this is under the `resources/queries` directory but you can change
         * this to anything you see fit.
         */
        'query_path' => resource_path('queries'),

        /**
         * This is the default connection that will be returned if you run a
         * query directly from the QuleManager instance.
         */
        'connection' => 'default',

    ],
];
