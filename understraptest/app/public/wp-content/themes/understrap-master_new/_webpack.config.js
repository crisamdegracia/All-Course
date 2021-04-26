const currentTask = process.env.npm_lifecycle_event; // eto ung package.json na mga 
const path = require('path');

//live reload plugin for the reloading of browser when file changes
const LiveReloadPlugin = require('webpack-livereload-plugin');
const HtmlWebpackPlugin = require("html-webpack-plugin");
/**
        * All files inside webpack's output.path directory will be removed once, but the
        * directory itself will not be. If using webpack 4+'s default configuration,
        * everything under <PROJECT_DIR>/dist/ will be removed.
        * Use cleanOnceBeforeBuildPatterns to override this behavior.
        *
        * During rebuilds, all webpack assets that are not used anymore
        * will be removed automatically.
        *
        * See `Options and Defaults` for information
 */
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

//PostCSS is a tool for transforming CSS with JavaScript plugins.
const postCSSPlugins = [require("postcss-import"), require("postcss-mixins"), require("postcss-simple-vars"), require("postcss-nested"), require("postcss-hexrgba"), require("postcss-color-function"), require("autoprefixer")];

// TO HANDLE THE 
// STYLE-LOADER IS AN ALTERNATIVE - DIFFERENCE IS STYLE WILL BE INJECTED IN THE INTO THE JAVASCRIPT BUNDLE
//  - WHILE mini-css will create one final  CSS file
const MiniCssExtractPlugin = require("mini-css-extract-plugin");


//Path for different folder
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;
let mode = "development";


if (currentTask === "production")
{
  mode = "production"
}

module.exports = {
  // target: "web",
  mode: mode,
  //ung main pala dito is pwedeng maging pangalan ng sa output [name].bundle.js = main.bundle.js pwedeng app, or kahit ano ipangalan, 
  //vendor, conventional name. 
  // entry: {
  //   vendor: paths.dev + '/js/bootstrap4/bootstrap.bundle.js',
  //   scripts: paths.dev + '/js/index.js'
  // },
  // entry: paths.dev + '/test.js',
  entry: {
    // main: {
      //     import: paths.dev + '/test.js',
      //     dependOn: 'shared',
      //   }, 
      //   shared: 'bootstrap'
      // },
      // {
        vendor: paths.dev + '/js/bootstrap4/bootstrap.js',
        main: paths.dev + '/test.js',
      // style: [
      //   paths.sass + '/theme.scss',
      //   paths.sass + '/custom-editor-style.scss'
      // ]
    // }
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    publicPath: '/dist/',
    // publicPath: "/",
    //kapag hindi tayo nag initiate ng path dito, automatic sya mapupunta sa /dist folder, xempre need natin mag create muna non.
    // path: path.resolve(__dirname, 'js/'),
    filename: '[name].[contenthash].js',
    assetModuleFilename: "images/[hash][ext][query]",
  },

  optimization: {
    splitChunks: {
      chunks: 'all'
    }
    // runtimeChunk: 'single'
  },

  module: {
    rules: [
      {
        //CODE-css2 - what it does is find the CSS  then
        test: /\.s?css$/i,
        // CODE-css3 - then use the loader here
        use: [

          // "style-loader",
          MiniCssExtractPlugin.loader,
          // Interprets `@import` and `url()` like `import/require()` and will resolve them
          "css-loader", // has a minifying abilty

          // Loader for webpack to process CSS with PostCSS
          "postcss-loader",
          "sass-loader",  // meron naring simple vars
        ]
        //1 of the reasons daw kaya nasa baba ung sass-loader
        //kapag hindi sya nasa baba pag nag merong dobol slash as koment e hindi mag cocompile ung sass file
        //tsaka daw ung mga prefixes blahblah
        //ETO ung nasa TUTORIAL

        // Basta after mag lagay ng sa PLUGINS[], dito ka mag seset ng  TEST and USE
        // ung test un ung mag dedetect, na mga nilagay natin enty, css or js, so here is CSS SASS SCSS

      },

      {
        test: /\.js$/,
        // exclude: /(node_modules)/,
        use: [
          {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-env"]
            }
          }
        ]
      },
      {  // for this to work please import the image in the js files
        test: /\.(png|jpe?g|gif|svg)$/i,
        /**
         * The `type` setting replaces the need for "url-loader"
         * and "file-loader" in Webpack 5.
         *
         * setting `type` to "asset" will automatically pick between
         * outputing images to a file, or inlining them in the bundle as base64
         * with a default max inline size of 8kb
         */
        type: "asset",

        /**
      * If you want to inline larger images, you can set
      * a custom `maxSize` for inline like so:
      */
        // parser: {
        //   dataUrlCondition: {
        //     maxSize: 30 * 1024,
        //   },
        // },
      }

    ]
  },
  plugins: [

    //creates 1 big style.css in the dist folder actually wakanda.css un.
    new MiniCssExtractPlugin({ filename: 'styles.bundle.css' }),

    //cleans unecessary files after build
    new CleanWebpackPlugin(),


    //this is for testing use only dun sa theory ko na dun sa /dist/index.html lang 
    //gagana ung live reload ng webpack. 
    // new HtmlWebpackPlugin({
    //   template: "./src/index.html",
    // }),


    //we need this so the browser will live reload when code changes and compile.
    new LiveReloadPlugin({
      protocol: "http",
      hostname: "understraptest.local",
      appendScriptTag: true,
    })
    // CODE-CSS1 - After neto CODE-CSS2
  ],

  devtool: "source-map",
  devServer: {
    public: "http://understraptest.local", // sa URL na gagana ung Live reload sana. pero hindi ko kaya mapa live reload
    //publicPath: "http://understraptest.local",   // gumana parin kahit wala to
    //contentBase: path.resolve(__dirname, 'dist'),
    //contentBasePublicPath: "http://understraptest.local", //Tell the server at what URL to serve devServer.contentBase static content
    // hot: true,
    //watchContentBase: true,
    //liveReload: true,  // Kapag eto hindi nag ge-generate ng .hot-update na napaka rami
    // hotOnly: true,
    // port: 3000,
    open: true,
    writeToDisk: true, //eto ung nagpapabago ng mga changes!
    // historyApiFallback: true,
    // proxy: {
    //   '/': 'http://understraptest.local/'    // wala wenta rin pala to
    // },
    // headers: {
    //   "Access-Control-Allow-Origin": "*"    // diko alam kung para san to
    // }
  }
}

