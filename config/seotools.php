<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [

            'title' => "Αρχείο Νίκου Εγγονόπουλου | Nikos Engonopoulos Archive",
            'titleBefore' => false,
            'description' => "Nikos Engonopoulos (1907-1985) digital archive: over 10,000 digitized documents, manuscripts, photographs and letters by the Greek surrealist painter and poet. Research project by Panteion University, ASFA and UniWA. Funded by HFRI and NextGenerationEU.",
            'separator' => ' | ',
            'keywords' => ['Nikos Engonopoulos', 'ArchArt Project', 'Greek surrealism', 'Ελληνική τέχνη', 'ψηφιοποίηση', 'digital archive', 'surrealist painter', 'modern Greek poetry', 'cultural heritage', 'Αρχείο Εγγονόπουλου'],
            'canonical' => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots' => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => 'Αρχείο Νίκου Εγγονόπουλου | Nikos Engonopoulos Archive',
            'description' => "Digitized archive of Greek surrealist Nikos Engonopoulos (1907-1985): manuscripts, photographs, letters, and works spanning poetry and painting.",
            'url' => null,
            'type' => 'website',
            'site_name' => 'ArchArt Project — Nikos Engonopoulos Archive',
            'image' => env('APP_URL') . '/storage/logos/archart.jpg',
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => '@ArchArtProject',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => 'Αρχείο Νίκου Εγγονόπουλου | Nikos Engonopoulos Archive',
            'description' => "Digitized archive of Greek surrealist Nikos Engonopoulos (1907-1985): manuscripts, photographs, letters, and works spanning poetry and painting.",
            'url' => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type' => 'WebPage',
            'images' => [],
        ],
    ],
];
