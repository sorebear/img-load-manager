const path = require('path');

const config = {
   entry: './src/js/index.js',
   output: {
      path: path.resolve(__dirname),
      filename: 'bundle.js',
   },
   module: {
      loaders: [{
        test: /\.jsx?$/,
        exclude: /(node_modules|bower_components)/,
        loader: 'babel-loader',
        query: {
          presets: ['es2015'],
        },
      }],
    },
};

module.exports = config;
