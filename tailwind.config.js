/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./node_modules/tw-elements/js/**/*.js"
  ],
  theme: {
    extend: {
      colors : {
        'dark': '#1C1B1B', 
      }
    },
  },
  plugins: [
    require('flowbite/plugin','tw-elements/plugin.cjs'),
    require('@tailwindcss/typography'),
  ],
}

