const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');

module.exports = {
    entry: {
        app: './public/js/index.js',
    },
    /*devtool: 'inline-source-map',
    devServer: {
        contentBase: './dist',
        hot: true
    },*/
    module: {
        rules: [{
                 test: /\.css$/,
                 use: ['style-loader', 'css-loader']
                },{
                test: /\.(png|woff|woff2|eot|ttf|svg|otf)$/,
                loader: 'file-loader?limit=100000'
                }
           ]
    },
    plugins: [
        new CleanWebpackPlugin(['dist']),
        new HtmlWebpackPlugin({
            title: 'Output Management'
      }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        }),
        /*new webpack.NamedModulesPlugin(),
        new webpack.HotModuleReplacementPlugin()*/
    ],
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'dist'),
    },
    mode: "production"

};