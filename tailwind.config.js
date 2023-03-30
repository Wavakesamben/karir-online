/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors:{
        'primary': '#00C1DE',
        'level2' : '#004651',
        'level3' : '#013138',
        'secondary' : '#EF7230'
      },
    },
  },
  plugins: [],
}
