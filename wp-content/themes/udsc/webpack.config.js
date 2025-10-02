const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === "development";

  const devServer = {
    static: "./dist",
    hot: true,
  };

  return {
    mode: isDevelopment ? "development" : "production",
    devtool: isDevelopment ? "source-map" : false,
    entry: {
      index: path.resolve(process.cwd(), "src/js", "index.js"),
    },
    output: {
      path: path.resolve(process.cwd(), "dist"),
      filename: "[name].js",
    },

    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-env"],
            },
          },
        },
      ],
    },
    plugins: [],
  };
};
