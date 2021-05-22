const path = require('path');
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;

module.exports = {
 
	/* 
The main problem is with Webpack 5. It doesn't preload the polyfill of Node.js. I see that this issue can help you. https://github.com/webpack/webpack/issues/11282
To solve it: npm install util, and add it into webpack.config.js:

yan ung problem, kaya meron netong resolve {}
	*/
	resolve: {
		fallback: {
			util: require.resolve("util/")
		}
	},
	entry: paths.dev + '/index.js',
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "[name].bundle.js"
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: 'babel-loader'
			}
		]
	},
	mode: 'development'
}