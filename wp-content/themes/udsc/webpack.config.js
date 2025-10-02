const path = require("path");

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === "development";

  const devServerConf = {
    static: "./dist",
    hot: true,
    port: 3000,
    open: false,
    watchFiles: ["src/js/**/*.js", "src/**/*.css", "**/*.php"],
    proxy: {
      "/": {
        target: "http://dolg.loc",
        changeOrigin: true,
        secure: false,
        logLevel: "debug",
      },
    },
  };

  return {
    mode: isDevelopment ? "development" : "production",
    devtool: isDevelopment ? "source-map" : false,
    entry: {
      index: path.resolve(process.cwd(), "src/js", "index.js"),
    },
    output: {
      path: path.resolve(process.cwd(), "dist/js"),
      filename: "[name].js",
      clean: true,
    },
    devServer: isDevelopment ? devServerConf : undefined,
    watchOptions: isDevelopment
      ? {
          poll: 1000,
          aggregateTimeout: 300,
          ignored: /node_modules/,
        }
      : undefined,
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
  };
};
