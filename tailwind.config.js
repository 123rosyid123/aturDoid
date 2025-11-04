/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    'bg-gradient-biru',
    'bg-gradient-oranye',
    'bg-text-gradient-biru',
    'bg-text-gradient-oranye',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Roboto', 'sans-serif'],
        roboto: ['Roboto', 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
      },
      backgroundImage: {
        'gradient-biru': 'linear-gradient(180deg, #212E5E 0%, #2E5396 100%)',
        'gradient-oranye': 'linear-gradient(180deg, #F78422 0%, #E1291C 96%)',
        'text-gradient-biru': 'linear-gradient(180deg, #212E5E 0%, #2E5396 100%)',
        'text-gradient-oranye': 'linear-gradient(180deg, #F78422 0%, #E1291C 96%)',
      },
      colors: {
        biru: {
          gelap: '#212E5E',
          terang: '#2E5396',
        },
        oranye: {
          terang: '#F78422',
          gelap: '#E1291C',
        },
      },
    },
  },
  plugins: [],
}

