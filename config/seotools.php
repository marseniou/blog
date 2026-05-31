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

            'title' => "Αρχείο Νίκου Εγγονόπουλου",
            'titleBefore' => false,
            'description' => "Ψηφιοποιημένο αρχείο του Νίκου Εγγονόπουλου (1907-1985), Έλληνα υπερρεαλιστή ζωγράφου και ποιητή. Πάνω από 10.000 ψηφιοποιημένα τεκμήρια, χειρόγραφα, φωτογραφίες και επιστολές. Ερευνητικό έργο των Παντείου Πανεπιστημίου, ΑΣΚΤ και ΠΑΔΑ.",
            'separator' => ' | ',
            'keywords' => ['Αρχείο Νίκου Εγγονόπουλου', 'ArchArt Project', 'Ελληνική τέχνη', 'υπερρεαλισμός', 'ψηφιοποίηση', 'πολιτιστική κληρονομιά', 'Nikos Engonopoulos', 'Greek surrealism', 'digital archive'],
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
            'title' => 'Αρχείο Νίκου Εγγονόπουλου',
            'description' => "Ψηφιοποιημένο αρχείο του Νίκου Εγγονόπουλου (1907-1985), Έλληνα υπερρεαλιστή ζωγράφου και ποιητή. Χειρόγραφα, φωτογραφίες, επιστολές και έργα ζωγραφικής και ποίησης.",
            'url' => null,
            'type' => 'website',
            'site_name' => 'ArchArt Project — Αρχείο Νίκου Εγγονόπουλου',
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
            'title' => 'Αρχείο Νίκου Εγγονόπουλου',
            'description' => "Ψηφιοποιημένο αρχείο του Νίκου Εγγονόπουλου (1907-1985), Έλληνα υπερρεαλιστή ζωγράφου και ποιητή. Χειρόγραφα, φωτογραφίες, επιστολές και έργα ζωγραφικής και ποίησης.",
            'url' => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type' => 'WebPage',
            'images' => [],
        ],
    ],
];
