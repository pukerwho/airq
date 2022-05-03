const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require('path');

module.exports = {
  ...defaultConfig,
  entry: {
    'gutenberg-filters': './gutenberg-dev/js/gutenberg-filters.js'
  },
  output: {
    path: path.join(__dirname, './gutenberg/js/'),
    filename: '[name].js'
  }
}