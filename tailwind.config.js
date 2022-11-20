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
				'indigo': '#050831',
				'blue': '#133072',
				'rose': '#F90052',
				'light-gray': '#ccc',
				'lighter-gray': '#e2e2e2',
			}
		}
	},
  plugins: [],
}
