const path = require("path");

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === "development";

  return {
    mode: isDevelopment ? "development" : "production",
    entry: {
      index: "./src/js/index.js",
    },
    output: {
      path: path.resolve(__dirname, "dist/js"),
      filename: "[name].js",
      clean: true,
    },
    devServer: isDevelopment ? {
      static: "./dist",
      hot: false,
      liveReload: true,
      port: 3000,
      devMiddleware: {
        writeToDisk: true
      },
      proxy: {
        "/": "http://dolg.loc"
      }
    } : undefined,
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: "babel-loader"
        },
      ],
    },
  };
};
