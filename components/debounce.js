/*!
 {{IMPORT root}}
 */

tt.debounce = function (cb, delay = 250) {
  let timeout;
  return (...args) => {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
      cb(...args);
    }, delay)
  }
};