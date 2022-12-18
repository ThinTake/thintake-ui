class Ajax {
    static request(options) {
      const xhr = new XMLHttpRequest();
      const method = options.method || 'GET';
      const url = options.url;
      const data = options.data;
      const success = options.success;
      const error = options.error;
  
      xhr.open(method, url);
  
      if (options.headers) {
        Object.entries(options.headers).forEach(([key, value]) => {
          xhr.setRequestHeader(key, value);
        });
      }
  
      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
          if (success) {
            success(xhr.responseText);
          }
        } else {
          if (error) {
            error(xhr.statusText);
          }
        }
      };
  
      xhr.onerror = function() {
        if (error) {
          error(xhr.statusText);
        }
      };
  
      xhr.send(data);
    }
  
    static get(url, success, error) {
      this.request({
        method: 'GET',
        url: url,
        success: success,
        error: error,
      });
    }
  
    static post(url, data, success, error) {
      this.request({
        method: 'POST',
        url: url,
        data: data,
        success: success,
        error: error,
      });
    }
  
    static put(url, data, success, error) {
      this.request({
        method: 'PUT',
        url: url,
        data: data,
        success: success,
        error: error,
      });
    }
  
    static delete(url, success, error) {
      this.request({
        method: 'DELETE',
        url: url,
        success: success,
        error: error,
      });
    }
  }

  

//   Usage
Ajax.get('http://example.com/api/endpoint', function(response) {
  console.log(response);
});

Ajax.post('http://example.com/api/endpoint', { foo: 'bar' }, function(response) {
  console.log(response);
});
