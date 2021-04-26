const path = require('path');
const postCSSPlugins = [require("postcss-import"), require("postcss-mixins"), require("postcss-simple-vars"), require("postcss-nested"), require("postcss-hexrgba"), require("postcss-color-function"), require("autoprefixer")]

var cfg = require('./gulpconfig.json');
var paths = cfg.paths;


module.exports = {
  entry: paths.dev + '/js/custom-javascript.js',
  vendor: paths.dev + '/js/bootstrap4/bootstrap.js',
  output: {
    path: path.resolve(__dirname, 'js/'),
    filename: 'theme.js'
  },
  plugins: [],
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: [["@babel/preset-env", { targets: { node: "12" } }]]
          }
        }
      }
    ]
  }
}