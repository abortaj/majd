<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "2x2", // set false to total remove
            'description'  => 'المدونة التقنية - أخبار التقنية بين يديك
عالم التقنية موقع لنشر الاخبار التقنية والمقالات، ويغطي أخبار أكبر الشركات التقنية مثل آبل وسامسونج ومايكروسوفت وقوقل وفيس بوك وتويتر', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['أخبار','برمجة','مواقع','تيكنولوجيا'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'        => "2x2", // set false to total remove
            'description'  => 'المدونة التقنية - أخبار التقنية بين يديك
عالم التقنية موقع لنشر الاخبار التقنية والمقالات، ويغطي أخبار أكبر الشركات التقنية مثل آبل وسامسونج ومايكروسوفت وقوقل وفيس بوك وتويتر', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'المدونة التقنية',
            'images'      => ['http://koujar.info/blog/site/images/logo.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
