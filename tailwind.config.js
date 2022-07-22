/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'dark-blue': '#0A1C26',
        'hover-blue': '#06394C'
      }
    },
  },
  plugins: [],
}
