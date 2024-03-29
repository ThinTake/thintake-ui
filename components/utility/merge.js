/*!
 {{IMPORT root}}
 */

tt.merge = function (obj = { }, defaults) {
    for (const key in defaults) {
      if (typeof obj[key] === 'undefined') {
        obj[key] = defaults[key];
      }
    }
    return obj;
}