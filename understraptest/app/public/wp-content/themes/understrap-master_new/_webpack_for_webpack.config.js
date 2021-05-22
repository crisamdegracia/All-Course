//current task if development or production
const currentTask = process.env.npm_lifecycle_event;

//eto bigay ng node js na absolute path like this -path.resolve(__dirname) - eto ung path natin
const path = require('path');

//ginamit ko for live reload plugin, pero hindi ko mapagana sa php files. 
const LiveReloadPlugin = require('webpack-livereload-plugin');

//testing gamit lang dun sa default na pag gamit ng webpack na need mo ng html file to insert ung mga bundle sa dist/index.html
const HtmlWebpackPlugin = require("html-webpack-plugin");

//About. By default, this plugin will remove all files inside webpack's output. path directory, as well as all unused webpack assets after every successful rebuild.
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

//eto hindi ko parin alam kung pano ko mapapagana
const postCSSPlugins = [require("postcss-import"), require("postcss-mixins"), require("postcss-simple-vars"), require("postcss-nested"), require("postcss-hexrgba"), require("postcss-color-function"), require("autoprefixer")];

//eto eto mag cocompile lahat ng css in one file
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

//eto nag paload ng live reload ko sa browser
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
// const browserSync = require("browser-sync").create();
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;
let mode = "development";


if (currentTask === "production")
{
	mode = "production"
}

module.exports = {

	mode: mode,
	// entry: './src/index.js',
	entry: {
		main: paths.dev + '/index.js',
		// vendor: paths.dev + '/js/bootstrap4/bootstrap.js', //gumagana
		// vendor: paths.node + '/bootstrap/dist/js/bootstrap.bundle.js',
		// vendor: paths.node + '/@glidejs/glide/dist/glide.js',
		// themeModules: paths.dev + '/modules.js',
		// styles: paths.dev + '/styles.js',
		// styles: paths.css + '/style.css',
		// fictionalStyles: paths.dev + '/fictional.js',
	},

	// entry:[ paths.node + '/bootstrap/dist/js/bootstrap.js', paths.dev + '/index.js'],
	output: {
		path: path.resolve(__dirname, 'dist'),
		publicPath: '/dist/',
		filename: 'js/[name].bundle.js',
		assetModuleFilename: "images/[hash][ext][query]",
		clean: true
	},

	optimization: { // my problem ata dito kapag mag import sa modules!
		// runtimeChunk: 'single',
		// splitChunks: {
		//   cacheGroups: {
		// 	vendor: {
		// 	  test: /[\\/]node_modules[\\/]/,
		// 	  name: 'vendors',
		// 	  chunks: 'all',
		// 	},
		//   },
		// },
	},
	plugins: [
		new MiniCssExtractPlugin({ filename: 'style/[name].bundle.css' }),
		new CleanWebpackPlugin(),
		// new LiveReloadPlugin({
		// 	protocol: "http",
		// 	hostname: "understraptest.local",
		// 	appendScriptTag: true,
		// }),
		// new BrowserSyncPlugin({
		// 	host: "understraptest.local/",
		// 	port: 3000,
		// 	proxy: "understraptest.local/", // devserver
		// 	files: [
		// 		path.resolve(__dirname, './**/*.php'),
		// 		//   path.resolve(__dirname, './**/*.php')
		// 	]
		// },
		// 	{
		// 		// prevent BrowserSync from reloading the page
		// 		// and let Webpack Dev Server take care of this
		// 		//   reload: false
		// 	})
	],
	module: {
		rules: [
			{

				test: /\.s?css$/i,
				use: [
					MiniCssExtractPlugin.loader,
					"css-loader",
					// "postcss-loader",

					{
						loader: "postcss-loader",
						options: {
							postcssOptions: {
								plugins: {
									"postcss-simple-vars": {},
									
								},
							},
						},
					},
					"sass-loader",
				]
			},

			{
				test: /\.js$/,
				// exclude: /(node_modules)/,
				use: "babel-loader"

				// [
				// 	{
				// 		loader: "babel-loader",
				// 		options: {
				// 			presets: [["@babel/preset-env"]]
				// 		}
				// 	}
				// ]
			},
			{
				test: /\.(png|jpe?g|gif|svg)$/i,
				type: "asset",
			}

		]
	},
	
	devtool: "source-map",
	devServer: {
	contentBase: path.join(__dirname),
	public: "http://understraptest.local",
	// hot: true,
	open: true,
	writeToDisk: true
	}

}



