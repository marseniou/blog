import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './awcodes/filament-tiptap-editor/resources/**/*.blade.php',
        "./vendor/outerweb/filament-image-library/resources/views/**/*.blade.php",


    ],
}
