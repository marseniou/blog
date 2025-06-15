/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {


    extend: {
        typography: {
        DEFAULT: {
          css: {
            maxWidth: '75ch', // add required value here
          }
        }
      }
    },
  },
  plugins: [
    require('daisyui'),
    require('@tailwindcss/typography'),
  ],
  daisyui: {
    themes: [
        {mytheme:{
            "primary": "#c4afc5",
            "base-300": "#f8f9fa",
        },
    },
      'light'
    ],
  },
}

