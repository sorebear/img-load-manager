const path = require('path');

const config = {
   entry: './src/js/index.js',
   output: {
      path: path.resolve(__dirname),
      filename: 'bundle.js',
   },
};

module.exports = config;
