// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Force CSS update
// https://github.com/webpack-contrib/extract-text-webpack-plugin/issues/30#issuecomment-256958209
if (process.env.NODE_ENV !== 'production') {
  if (module.hot) {
    const reporter = window.__webpack_hot_middleware_reporter__;
    const success = reporter.success;
    reporter.success = function () {
      document.querySelectorAll('[id*="sage"]').forEach((link) => {
        link.href = link.href.replace(/(\?\d+)?$/, `?${Date.now()}`);
      });
      success()
    }
  }
}

// Load Events
jQuery(document).ready(() => routes.loadEvents());
