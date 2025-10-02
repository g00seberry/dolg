const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === "development";

  return {
    ...defaultConfig,
    mode: isDevelopment ? "development" : "production",
    devtool: isDevelopment ? "source-map" : false,
    entry: {
      index: path.resolve(process.cwd(), "src", "index.js"),
      "mobile-menu": path.resolve(process.cwd(), "src", "js", "mobile-menu.js"),
    },
    output: {
      ...defaultConfig.output,
      path: path.resolve(process.cwd(), "assets/js"),
      filename: "[name].js",
    },
    resolve: {
      ...defaultConfig.resolve,
      alias: {
        ...defaultConfig.resolve.alias,
      },
    },
    module: {
      ...defaultConfig.module,
      rules: [
        ...defaultConfig.module.rules,
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
    externals: {
      ...defaultConfig.externals,
    },
    watch: isDevelopment,
    watchOptions: isDevelopment
      ? {
          ignored: /node_modules/,
          aggregateTimeout: 300,
          poll: 1000,
        }
      : undefined,
    plugins: [
      ...(isDevelopment
        ? [
            new BrowserSyncPlugin({
              host: "localhost",
              port: 3000,
              proxy: "http://dolg.loc/",
              files: ["**/*.php", "**/*.css", "**/*.js", "assets/js/*.js"],
              reloadDelay: 0,
              injectChanges: true,
              notify: false,
            }),
          ]
        : []),
    ],
  };
};
