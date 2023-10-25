const path = require('path');

module.exports = {
  /**
   * Resolve options
   */
  resolve: {
   alias: {
     Modules: path.resolve(__dirname, 'resources/js/modules'),
   }
  }
};
